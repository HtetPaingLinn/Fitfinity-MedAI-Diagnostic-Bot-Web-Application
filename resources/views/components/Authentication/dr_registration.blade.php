
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    <style>
        @layer components {
            .bg-custom-gray {
                background: #e8e8ed;
            }
            .text-custom-navy {
                color: #004A87;
            }
            .custom {
                color: #00b1ff;
            }
            .custom-font {
                font-family: "Hanken Grotesk", sans-serif;
            }
            .shadow-custom {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .vertical-line {
                border-right: 1px solid #e0e0e0;
            }
            .form-container {
                position: relative;
            }
            .custom-gradient {
                background-image: conic-gradient(from 0deg, #A0DAA9, #34A853);
            }
            .nrc-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 0.2rem;
            }
            .text-right-placeholder::placeholder {
                text-align: right;
            }
            input[type="number"] {
                text-align: right;
            }
            .button-container {
                display: flex;
                justify-content: flex-end;
                gap: 0.5rem;
                padding-top: 1rem;
            }
            .prefix {
                margin-right: 6px;
            }
        }
    </style>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<body class="custom-font">
<div class="min-h-fit w-full -mt-5 flex flex-col place-content-center items-center justify-center ">
    <div class="my-14 customXS:m-6 sm:m-10">

        <h1 class="mb-1 font-semibold text-customGreen2 text-2xl flex gap-1 items-baseline">Create doctor's account <span class="text-sm text-customGreen3 pl-2"> FITFINITY  </span></h1>

        <div id="application-form" class="form-container grid max-w-2xl gap-4 pt-10 pb-6 px-8 sm:grid-cols-2 bg-white rounded-md border-t-[6px] border-customGreen3 shadow-custom">
                <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line pb-2">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="doctor_name" class="pt-1">Name</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="text" name="doctor_name" id="doctor_name" :value="old('doctor_name')" placeholder="someone"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error :class="'font-semibold'" name="doctor_name" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="email" class="pt-1">Email</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="text" name="email" id="email" :value="old('email')" placeholder="someone@gmail.com"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error :class="'font-semibold'" name="email" />
                    </div>
                </div>
                <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="phone" class="pt-1">Phone</label>
                            <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <div class="prefix text-sm text-gray-900">+959</div>
                                <x-form-input type="text" name="phoneNo" id="phoneNo" :value="old('phoneNo')" placeholder="xxx-xxx-xxx"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error :class="'font-semibold'" name="phoneNo" />
                    </div>
                    <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line">
                        <div class="flex flex-col space-y-2">
                            <div class="flex flex-col sm:flex-row items-center space-x-6">
                                <label for="password" class="pt-1">Password</label>
                                <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                    <x-form-input type="password" name="password" :value="old('password')" id="password"> </x-form-input>
                                </div>
                            </div>
                            <x-form_error :class="'font-semibold'" name="password" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col space-y-7 col-span-2 sm:pr-4 sm:vertical-line">
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <label for="dept_id" class="pt-2.5 pr-2.5">Department ID</label>
                        <select id="dept_id" name="dept_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                            <option value="1"> Cardiology</option>
                            <option value="2"> Dermatology </option>
                            <option value="3"> Otolaryngology </option>
                            <option value="4"> Emergency </option>
                            <option value="5"> Orthopaedic </option>
                            <option value="6"> Neurology </option>
                            <option value="7"> Obstetrics & Gynecology </option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <label for="role_id" class="pt-2.5 pr-2.5">Role ID</label>
                        <select id="role_id" name="role_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                            <option value="1"> Professor </option>
                            <option value="2"> Assistant professor </option>
                            <option value="3"> Fellow </option>
                        </select>
                    </div>
                </div>
                <div class="button-container col-span-2 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="button" class="inline-flex items-center px-3 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancel
                    </button>
                    <button type="button" onclick="viewSchedule()" id="create-btn" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Next
                    </button>
                </div>
            </div>
    </div>
</div>



