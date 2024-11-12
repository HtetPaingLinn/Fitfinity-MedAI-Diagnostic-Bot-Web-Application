@use(Carbon\Carbon)

<x-layout_white class="bg-white">
    <div class="bg-white rounded-lg shadow-lg max-w-[800px] w-full mx-[60px] mb-10">
        <div class="bg-gradient-to-r from-blue-300 via-purple-300 to-pink-300 rounded-t-lg h-24 flex items-center justify-center relative">
            <div class="absolute top-[45px] left-[45px]">
                <img class="rounded-full border-4 border-white w-28 h-28 object-cover" src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile Picture">
            </div>
        </div>

        <div class="flex justify-between items-center ml-36 mt-4 px-6">
            <div>
                <h2 class="text-2xl font-semibold text-customGray">{{ $user->username }} <span class="ml-4 text-[11px] font-thin"> Joined on {{ $user->created_at->format('Y M d') }} </span></h2>
                @if ($user->gender == 'male')
                    <p class="text-[11px] text-customGray font-thin -mt-1.5">He/Him</p>
                @else
                    <p class="text-[11px] text-customGray font-thin -mt-1.5">She/Her</p>
                @endif
            </div>
        </div>
        <div class="px-14 py-4 pb-5">
            <div class="border-b-2 border-black/5 flex flex-row">
                <div class="text-left mr-[35px]">
                    <button id="account-btn" onclick="showSection('account')" class="active-tab">
                        <p class="text-sm text-gray-400 font-thin transition-colors duration-200"> <i class="fa-solid fa-user-large mr-2"></i> Account </p>
                    </button>
                </div>
                <div class="text-left mr-[35px]">
                    <button id="pwd-btn" onclick="showSection('pwd')" class="active-tab">
                        <p class="text-sm text-gray-400 font-thin transition-colors duration-200"> <i class="fa-solid fa-key"></i> Update Password </p>
                    </button>
                </div>

                <div class="text-left">
                    <button id="bmi-btn" onclick="showSection('bmi')">
                        <p class="text-sm text-gray-400 font-thin transition-colors duration-200"> <i class="fa-solid fa-calculator"></i> BMI Calculator </p>
                    </button>
                </div>
            </div>
        </div>
        <div class="px-14 pb-10">
            <div id="account-section">
                <p class="text-customGreen3 font-trebuchet font-semibold text-xl pb-4"> Personal </p>
                <div class="grid grid-cols-6 gap-4">
                    <div class="text-customGray font-trebuchet text-[15px] grid grid-cols-4 col-span-4">
                        <div class="space-y-2 col-span-1" id="field_names">
                            <p> Username </p>
                            <p> Phone </p>
                            <p> Email </p>
                            <p> NRC Number </p>
                            <p> Age </p>
                            <p> BMI </p>
                            <p> Blood Type </p>
                        </div>
                        <div class="space-y-2 text-right col-span-3 mr-10" id="field_values">
                            <p>{{ $user->username }}</p>
                            <p>{{ $user->phone }}</p>
                            <p>{{ $user->email }}</p>
                            <p class="tracking-wide">{{ $user->NRC }}</p>
                            @php
                                $birthDate = $user->date_of_birth;
                                $bd = Carbon::createFromFormat('Y-m-d', $birthDate);
                                $age = $bd->age;
                            @endphp
                            <p>{{ $age }} years</p>
                            @php
                                $kg = $user->weight;
                                $cm = $user->height;
                                $bmi = number_format(($kg / ($cm * $cm)) * 10000, 2);
                                switch ($bmi) {
                                    case ($bmi > 31):
                                        $status = "obese";
                                        break;
                                    case ($bmi >= 25 && $bmi <= 29.9):
                                        $status = "overweight";
                                        break;
                                    case ($bmi >= 18.5 && $bmi <= 24.9):
                                        $status = "normal";
                                        break;
                                    case ($bmi < 18.5):
                                        $status = "underweight";
                                        break;
                                }
                            @endphp
                            <p>{{ $bmi }} ({{ $status }})</p>
                            <p>{{ $user->blood }}</p>
                        </div>
                    </div>
                    <div class="bg-blue-300 p-4 rounded-lg shadow-lg max-w-[350px] col-span-2 flex flex-col justify-center mx-auto">
                        <p class="text-lg text-customGray font-semibold text-left">Health Quote</p>
                        <p class="text-sm text-gray-600 mt-2">{{ $randomQuote }}</p>
                    </div>
                </div>
                <button id="edit-profile-btn" class="w-[420px]" onclick="showSection('edit')">
                    <p class="text-sm text-customGreen3 font-semibold mt-6 text-right"> Edit Profile <i class="fa-solid fa-pencil"></i> </p>
                </button>
                @if(session()->has('success') || $errors->has('old_password') || $errors->has('password'))
                    <script>
                        window.onload = function() {
                            var messages = [];
                            @if(session()->has('success'))
                            messages.push("Success: {{ session()->get('success') }}");
                            @endif

                            @if($errors->has('old_password'))
                            messages.push(`Old Password Error: {{ $errors->first('old_password') }}`);
                            @endif

                            @if($errors->has('password'))
                            messages.push("Password Error: {{ $errors->first('password') }}");
                            @endif

                            if (messages.length > 0) {
                                alert(messages.join("\n"));
                            }
                        }
                    </script>
                @endif
            </div>

            <div id="edit-section" class="hidden">
                <p class="text-customGreen3 font-trebuchet font-semibold text-xl pb-4"> Edit Personal Information </p>
                <div class="grid grid-cols-6 gap-4">
                    <div class="text-customGray font-trebuchet text-[15px] col-span-4 max-w-[500px]">
                        <form action="/user_profile" method="post" class="space-y-[15px] mr-4">
                            @csrf
                            @method('PATCH')

                            <div class="flex items-center justify-between">
                                <label class="w-1/4" for="username">Username</label>
                                <input type="text" id="username" name="username" class=" border border-gray-400 rounded p-1 text-right w-1/2" value="{{ $user->username }}">
                            </div>
                            @error('username')
                            <p class="text-red-600 text-xs font-thin"> {{ $message }} </p>
                            @enderror

                            <div class="flex items-center justify-between">
                                <label class="w-1/4" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class=" border border-gray-400 rounded p-1 tracking-wide text-right w-1/2" value="{{ $user->phone }}">
                            </div>
                            @error('phone')
                            <p class="text-red-600 text-xs font-thin"> {{ $message }} </p>
                            @enderror

                            <div class="flex items-center justify-between">
                                <label class="w-1/4" for="email">Email</label>
                                <input type="email" id="email" name="email" class=" border border-gray-400 rounded p-1 text-right w-1/2" value="{{ $user->email }}">
                            </div>
                            @error('email')
                            <p class="text-red-600 text-xs font-thin"> {{ $message }} </p>
                            @enderror

                            <div class="flex items-center justify-between">
                                <label class="w-1/4">NRC Number</label>
                                <p class="tracking-wide w-3/4 text-right">{{ $user->NRC }}</p>
                            </div>

                            @php
                                $birthDate = $user->date_of_birth;
                                $bd = Carbon::createFromFormat('Y-m-d', $birthDate);
                                $age = $bd->age;
                            @endphp
                            <div class="flex items-center justify-between">
                                <label class="w-1/4">Age</label>
                                <p class="w-3/4 text-right">{{ $age }} years</p>
                            </div>

                            @php
                                $kg = $user->weight;
                                $cm = $user->height;
                                $bmi = number_format(($kg / ($cm * $cm)) * 10000, 2);
                                switch ($bmi) {
                                    case ($bmi > 31):
                                        $status = "obese";
                                        break;
                                    case ($bmi >= 25 && $bmi <= 29.9):
                                        $status = "overweight";
                                        break;
                                    case ($bmi >= 18.5 && $bmi <= 24.9):
                                        $status = "normal";
                                        break;
                                    case ($bmi < 18.5):
                                        $status = "underweight";
                                        break;
                                }
                            @endphp
                            <div class="flex items-center justify-between">
                                <label class="w-1/4">BMI</label>
                                <p class="w-3/4 text-right">{{ $bmi }} ({{ $status }})</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="w-1/4" for="blood">Blood Type</label>
                                <select name="blood" id="blood" class="border border-gray-400 text-right rounded p-1 w-1/2">
                                    <option value="A" {{ $user->blood == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $user->blood == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $user->blood == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ $user->blood == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                            @error('blood')
                            <p class="text-red-600 text-xs font-thin"> {{ $message }} </p>
                            @enderror

                            <div class="text-right">
                                <input type="submit" class="inline-flex items-center px-4 py-1.5 border border-transparent text-sm font-medium rounded text-white bg-customGreen3 hover:bg-customGreen2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4" value="Save Changes">
                            </div>
                        </form>
                    </div>

                    <div class="col-span-2 flex flex-col items-center mt-4 ml-5 border border-gray-400 max-h-[285px] rounded-lg w-full shadow-md shadow-gray-400">
                        <h2 class="text-lg font-semibold text-customGreen2 my-4 p-2">Update Your Photo</h2>
                        <div class="relative">
                            <img id="profileImage" src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-2 border-customGreen3">
                            <form method="POST" action="/user_profile/photo_update" enctype="multipart/form-data" class="flex flex-col items-center">
                                @csrf
                                @method('PATCH')
                                <div class="absolute bottom-0 right-0 bg-white rounded-full border border-customGreen3 mb-2 p-2 hover:bg-customGreen4 hover:border-customGray">
                                    <label for="photo" class="cursor-pointer text-customGray">
                                        <img src="{{ Vite::asset('resources/images/upload_photo.svg') }}" class="w-[30px] h-[30px]" alt="logo">
                                    </label>
                                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*" onchange="previewImage(event)">
                                </div>
                                <button type="submit" class="bg-customGreen3 hover:bg-customGreen2 font-semibold text-sm text-white py-2 px-6 rounded mt-4 -mb-10 font-trebuchet">
                                    Update Photo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <button id="back-profile-btn" class="w-[435px]" onclick="showSection('account')">
                    <p class="text-sm text-customGreen3 font-semibold mt-6 text-right"> Back to Profile <i class="fa-solid fa-arrow-left"></i> </p>
                </button>
            </div>

            <div id="pwd-section" class="max-w-md mx-auto p-8 bg-white rounded-lg">
                <h2 class="text-2xl font-semibold text-customGreen2 text-center mb-6">Update Your Password</h2>
                <form action="/user_profile/password_update" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-4 relative">
                        <label for="old_password" class="block text-sm font-medium text-customGreen2 mb-2">Old Password</label>
                        <div class="relative">
                            <input type="password" id="old_password" name="old_password" class="w-full p-3 text-customGreen2 border border-customGreen3 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen2 focus:border-transparent" placeholder="Your old password" required>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('old_password')">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group mb-4 relative">
                        <label for="password" class="block text-sm font-medium text-customGreen2 mb-2">New Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="w-full p-3 text-customGreen2 border border-customGreen3 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen2 focus:border-transparent" placeholder="Your new password" required>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('password')">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group mb-6 relative">
                        <label for="password_confirmation" class="block text-sm font-medium text-customGreen2 mb-2">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 text-customGreen2 border border-customGreen3 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen2 focus:border-transparent" placeholder="Confirm your password" required>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('password_confirmation')">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-customGreen3 text-white font-semibold rounded-lg hover:bg-customGreen2 transition-colors">Update Password</button>
                </form>
            </div>

            <div id="bmi-section">
                <h2 class="text-customGreen2 custom-font text-2xl font-bold mb-4">FitFinity BMI Calculator</h2>
                <form id="form" class="p-4 bg-transparent rounded-customMd md:p-6">
                    <h2 class="text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 m-4">Enter your details below</h2>
                    <div class="mt-4 flex items-center gap-4 text-customGreen3 font-semibold ml-4 md:mt-6">
                        <label class="flex-grow relative flex items-center">
                            <input type="radio" checked name="units" data-value="metric" id="metric" class="peer absolute w-0 h-0 opacity-0" />
                            <span class="relative cursor-pointer top-0 left-0 h-[24px] w-[24px] rounded-customFull border-[1px] border-customGreen3 peer-checked:bg-[#e1e7fe] peer-checked:before:opacity-100 before:opacity-0 before:w-[10px] before:h-[10px] before:absolute before:top-[7px] before:left-[7px] before:bg-customGreen3 before:rounded-customFull hover:border-customGreen3 transition-colors before:transition-opacity"></span>
                            <span class="ml-4">Metric</span>
                        </label>
                        <label class="flex-grow relative flex items-center">
                            <input type="radio" name="units" data-value="imperial" id="imperial" class="peer absolute w-0 h-0 opacity-0" />
                            <span class="relative cursor-pointer top-0 left-0 h-[24px] w-[24px] rounded-customFull border-[1px] border-customGreen3 peer-checked:bg-[#e1e7fe] peer-checked:before:opacity-100 before:opacity-0 before:w-[10px] before:h-[10px] before:absolute before:top-[7px] before:left-[7px] before:bg-customGreen3 before:rounded-customFull hover:border-customGreen3 transition-colors before:transition-opacity"></span>
                            <span class="ml-4">Imperial</span>
                        </label>
                    </div>

                    <!-- Metric Inputs -->
                    <div id="metric-inputs" class="">
                        <div class="mt-4 flex flex-col items-end gap-2 text-customBodyS md:flex-row md:mt-6 md:gap-4">
                            <div class="w-full ml-4">
                                <label for="height-cm" class="text-customGreen3">Height</label>
                                <div class="relative">
                                    <input type="text" id="height-cm" placeholder="0" class="mt-2 w-full rounded-customMd border-[1px] border-customGreen3 px-4 py-3 text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 focus:outline-customGreen3 placeholder:text-customGreen3" />
                                    <span class="absolute right-4 top-[35%] text-customBodyS tracking-customS text-customGreen3 leading-customBody font-semibold">cm</span>
                                </div>
                            </div>
                            <div class="w-full mr-4">
                                <label for="weight-kg" class="text-customGreen3">Weight</label>
                                <div class="relative">
                                    <input type="text" id="weight-kg" placeholder="0" class="mt-2 w-full rounded-customMd border-[1px] border-customGreen3 px-4 py-3 text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 focus:outline-customGreen3 placeholder:text-customGreen3" />
                                    <span class="absolute right-4 top-[35%] text-customBodyS tracking-customS text-customGreen3 leading-customBody font-semibold">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Imperial Inputs -->
                    <div id="imperial-inputs" class="hidden ml-4">
                        <div class="mt-4 flex flex-col items-end gap-1 text-customBodyS md:flex-row md:mt-6 md:gap-4">
                            <div class="flex flex-row gap-1 ml-2">
                                <div id="feet">
                                    <label for="height-ft" class="text-customGreen3">Height (ft)</label>
                                    <div class="relative">
                                        <input type="text" id="height-ft" placeholder="0" class="mt-2 w-full rounded-customMd border-[1px] border-customGreen3 px-4 py-3 text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 focus:outline-customGreen3 placeholder:text-customGreen3" />
                                        <span class="absolute right-4 top-[35%] text-customBodyS tracking-customS text-customGreen3 leading-customBody font-semibold">ft</span>
                                    </div>
                                </div>
                                <div id="inch">
                                    <label for="height-in" class="text-customGreen3">Height (in)</label>
                                    <div class="relative">
                                        <input type="text" id="height-in" placeholder="0" class="mt-2 w-full rounded-customMd border-[1px] border-customGreen3 px-4 py-3 text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 focus:outline-customGreen3 placeholder:text-customGreen3" />
                                        <span class="absolute right-4 top-[35%] text-customBodyS tracking-customS text-customGreen3 leading-customBody font-semibold">in</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mr-4">
                                <label for="weight-lbs" class="text-customGreen3">Weight (lbs)</label>
                                <div class="relative">
                                    <input type="text" id="weight-lbs" placeholder="0" class="mt-2 w-full rounded-customMd border-[1px] border-customGreen3 px-4 py-3 text-customBodyS tracking-customS leading-customBody font-semibold text-customGreen3 focus:outline-customGreen3 placeholder:text-customGreen3" />
                                    <span class="absolute right-4 top-[35%] text-customBodyS tracking-customS text-customGreen3 leading-customBody font-semibold">lbs</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 bg-customGreen3 rounded-customDefault p-4 text-customWhite md:mt-6 md:rounded-customResult mx-4 mb-4">
                        <div class="flex flex-col gap-2" id="result-introduction">
                            <p class="text-customBodyS tracking-customS leading-customBody font-semibold">Welcome!</p>
                            <p class="text-customBodyS">Enter your height and weight and you’ll see your BMI result here</p>
                        </div>
                        <div class="flex flex-col gap-2 md:flex-row md:items-center md:gap-4 visually-hidden" id="result-ready-values">
                            <div class="flex-1">
                                <p>Your BMI is...
                                <p class="mt-2 text-customFontL leading-customHeading tracking-customM font-semibold" id="result-value">0</p>
                            </div>
                            <p class="flex-1 text-customBodyS mt-10 mr-5" id="final_result"> </p>
                        </div>
                    </div>

                    <!-- Script for changing div between metric and imperial units -->
                    <script>
                        const metricRadio = document.getElementById('metric');
                        const imperialRadio = document.getElementById('imperial');
                        const metricDiv = document.getElementById('metric-inputs');
                        const imperialDiv = document.getElementById('imperial-inputs');
                        const cm = document.getElementById('height-cm');
                        const kg = document.getElementById('weight-kg');
                        const ft = document.getElementById('height-ft');
                        const inch = document.getElementById('height-in');
                        const lbs = document.getElementById('weight-lbs');
                        const result_value = document.getElementById('result-value');
                        const result_text = document.getElementById('result-text');
                        const final_result = document.getElementById('final_result');

                        function showDiv(units){
                            metricDiv.classList.add('hidden');
                            imperialDiv.classList.add('hidden');
                            document.getElementById(units + '-inputs').classList.remove('hidden');
                        }

                        function calc(cm, kg){
                            const heightM = cm / 100;
                            return kg / (heightM * heightM);
                        }

                        function getResult(){
                            const cm_val = cm.value;
                            const kg_val = kg.value;

                            const res = calc(cm_val, kg_val).toFixed(2);

                            let healthResult = '';
                            let idealWeightLower = '';
                            let idealWeightUpper = '';

                            if (res < 18.5) {
                                healthResult = 'an underweight';
                                idealWeightLower = (18.5 * (cm_val / 100) ** 2).toFixed(2);
                                idealWeightUpper = (24.9 * (cm_val / 100) ** 2).toFixed(2);
                            } else if (res >= 18.5 && res <= 24.9) {
                                healthResult = 'a healthy weight';
                                idealWeightLower = (18.5 * (cm_val / 100) ** 2).toFixed(2);
                                idealWeightUpper = (24.9 * (cm_val / 100) ** 2).toFixed(2);
                            } else if (res >= 25 && res <= 29.9) {
                                healthResult = 'an overweight';
                                idealWeightLower = (25 * (cm_val / 100) ** 2).toFixed(2);
                                idealWeightUpper = (29.9 * (cm_val / 100) ** 2).toFixed(2);
                            } else {
                                healthResult = 'an obese';
                                idealWeightLower = (30 * (cm_val / 100) ** 2).toFixed(2);
                                idealWeightUpper = (34.9 * (cm_val / 100) ** 2).toFixed(2);
                            }

                            if(cm_val && kg_val){
                                result_value.textContent = res;
                                final_result.textContent = `Your BMI suggests you’re ${healthResult}. Your ideal weight is between ${idealWeightLower} kg and ${idealWeightUpper} kg.`;
                            }
                            else {
                                result_value.textContent = '0';
                                final_result.textContent = '';
                            }
                        }

                        function calc2(ft, inch, lbs) {
                            const heightInTotal = (ft * 12) + inch;
                            return (lbs / Math.pow(heightInTotal, 2)) * 703;
                        }

                        function getResult2() {
                            const ft_val = parseFloat(ft.value) || 0;
                            const inch_val = parseFloat(inch.value) || 0;
                            const lbs_val = parseFloat(lbs.value) || 0;
                            let healthResult = '';
                            let idealWeightLower = '';
                            let idealWeightUpper = '';

                            const res = calc2(ft_val, inch_val, lbs_val).toFixed(2);

                            if (res < 18.5) {
                                healthResult = 'an underweight';
                                idealWeightLower = (18.5 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                                idealWeightUpper = (24.9 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                            } else if (res >= 18.5 && res <= 24.9) {
                                healthResult = 'a healthy weight';
                                idealWeightLower = (18.5 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                                idealWeightUpper = (24.9 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                            } else if (res >= 25 && res <= 29.9) {
                                healthResult = 'an overweight';
                                idealWeightLower = (25 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                                idealWeightUpper = (29.9 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                            } else {
                                healthResult = 'an obese';
                                idealWeightLower = (30 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                                idealWeightUpper = (34.9 * (ft_val * 12 + inch_val) ** 2 / 703).toFixed(2);
                            }

                            if (ft_val && inch_val && lbs_val) {
                                result_value.textContent = res;
                                final_result.textContent = `Your BMI suggests you’re ${healthResult}. Your ideal weight is between ${idealWeightLower} kg and ${idealWeightUpper} lbs.`;
                            } else {
                                result_value.textContent = '0';
                                final_result.textContent = '';
                            }
                        }

                        metricRadio.addEventListener('change', () => {
                            showDiv('metric');
                            cm.addEventListener('input', getResult);
                            kg.addEventListener('input', getResult);
                        });

                        imperialRadio.addEventListener('change', () => {
                            showDiv('imperial');
                            ft.addEventListener('input', getResult2);
                            inch.addEventListener('input', getResult2);
                            lbs.addEventListener('input', getResult2);
                        });

                        if(metricRadio.checked){
                            showDiv('metric');
                            cm.addEventListener('input', getResult);
                            kg.addEventListener('input', getResult);
                        }
                        else if(imperialRadio.checked){
                            showDiv('imperial');
                            ft.addEventListener('input', getResult2);
                            inch.addEventListener('input', getResult2);
                            lbs.addEventListener('input', getResult2);
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
</x-layout_white>

<script>
    function showSection(section) {
        const sections = ['account', 'edit', 'pwd', 'bmi'];
        const buttons = ['account-btn', 'pwd-btn', 'bmi-btn'];

        // Hide all sections
        sections.forEach(sec => {
            document.getElementById(sec + '-section').classList.add('hidden');
        });

        // Show the selected section
        document.getElementById(section + '-section').classList.remove('hidden');

        // Update button styles
        buttons.forEach(btn => {
            document.getElementById(btn).classList.remove('active-tab');
        });

        if (section !== 'edit') {
            document.getElementById(section + '-btn').classList.add('active-tab');
        }
    }

    function enableEditing() {
        const fields = document.querySelectorAll('.editable-field');
        fields.forEach(field => {
            field.readOnly = false;
            field.classList.add('border');
            field.classList.add('border-gray-400');
            field.classList.add('rounded');
            field.classList.add('p-1');
        });
        document.getElementById('edit-profile-btn').classList.add('hidden');
        document.getElementById('save-changes-btn').classList.remove('hidden');
    }

    function disableEditing() {
        const fields = document.querySelectorAll('.editable-field');
        fields.forEach(field => {
            field.readOnly = true;
            field.classList.remove('border');
            field.classList.remove('border-gray-400');
            field.classList.remove('rounded');
            field.classList.remove('p-1');
        });
        document.getElementById('edit-profile-btn').classList.remove('hidden');
        document.getElementById('save-changes-btn').classList.add('hidden');
    }

    document.addEventListener('DOMContentLoaded', function() {
        showSection('account'); // Show account section by default

        document.getElementById('user-profile-form').addEventListener('submit', function(e) {
            console.log('Form will be submitted');
        });
    });

    document.getElementById('user-profile-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission to debug
        console.log('Form data:', new FormData(this));

        fetch(this.action, {
            method: this.method,
            body: new FormData(this),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(response => {
            if (response.ok) {
                console.log('Form submitted successfully');
                window.location.href = '/user_profile';
            } else {
                return response.json().then(errors => {
                    console.error('Form submission failed:', errors);
                });
            }
        }).catch(error => {
            console.error('Form submission error:', error);
        });
    });

    function togglePassword(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function previewPhoto() {
        const photoInput = document.getElementById('photo');
        const currentPhoto = document.getElementById('current-photo');
        const file = photoInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                currentPhoto.src = e.target.result;
            };

            reader.readAsDataURL(file);
            document.getElementById('update-photo-label').textContent = 'Change Photo';
        }
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }


</script>

<style>
    .hidden {
        display: none;
    }
    .field-values-custom {
        margin-left: 40px; /* Adjust this value as needed */
    }
    .active-tab p {
        color: #309b7d !important;
        border-bottom: 2px solid #309b7d !important;
    }
    .active-tab p:hover {
        border-bottom: 2px solid #309b7d !important;
    }
    .transition-colors {
        transition: color 0.2s, border-bottom-color 0.2s;
    }

</style>
