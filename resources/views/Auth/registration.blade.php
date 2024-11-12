<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    <title>FitFinity | Registration Form</title>
    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>

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
</head>
<body class="custom-font bg-gray-50" >
<div class="min-h-screen w-full flex flex-col place-content-center items-center justify-center bg-gray-50">
    <div class="my-14 customXS:m-6 sm:m-10">
        <h1 class="mb-1 font-bold text-customGreen2 text-3xl flex gap-1 items-baseline custom-font">Registration Form <span class="text-sm text-customGreen3 pl-2"> FITFINITY </span></h1>

        <form action="/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-container grid max-w-2xl gap-4 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-[6px] border-customGreen3 shadow-custom">
                <div class="flex flex-col items-center sm:vertical-line gap-5 border border-black/25 rounded-md mr-4">
                    <div class="flex flex-col sm:flex-row items-center gap-5 mt-4">
                        <img class="inline-block w-14 h-14 ml-3 rounded-full ring-2 ring-white" src="https://preline.co/assets/img/160x160/img1.jpg" alt="Avatar" id="avatarPreview">
                        <div class="flex gap-x-2 mt-3 sm:mt-0">
                            <div>
                                <label for="photo" id="photoLabel" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-black/20 bg-white text-gray-800 shadow-sm hover:bg-customGreen2 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-black/25 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                    <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    Upload photo
                                </label>
                                <input type="file" name="photo" id="photo" class="hidden" accept=".jpeg,.png,.jpg,.gif,.svg" onchange="previewAvatar()">
                            </div>
                        </div>
                    </div>
                    <x-form_error name="photo" :class="'block px-2'"/>
                </div>

                <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line pb-2">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="username" class="pt-1">Name</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="text" name="username" id="username" :value="old('username')" placeholder="someone"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error name="username" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="email" class="pt-1">Email</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="text" name="email" id="email" :value="old('email')" placeholder="someone@gmail.com"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error name="email" />
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
                        <x-form_error name="phoneNo" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="date_of_birth" class="pt-1">Date of Birth</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="date" name="date_of_birth" id="date_of_birth" :value="old('date_of_birth')" min="1924-01-01" max="2009-08-01"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error name="date_of_birth" />
                    </div>
                </div>

                <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="password" class="pt-1">Password</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="password" name="password" :value="old('password')" id="password"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error name="password" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="password_confirmation" class="pt-1">Confirm Password</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="password" name="password_confirmation" id="password_confirmation"> </x-form-input>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="col-span-2 border-black/25 mt-4">

                <div class="flex flex-col space-y-7 pt-2 pr-4 vertical-line">
                    <div class="flex flex-col space-y-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <label for="weight" class="pt-1">Weight</label>
                            <div class="grid grid-cols-5">
                                <div class="col-span-4 flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                    <x-form-input type="number" name="weight" id="weight" :value="old('weight')" placeholder="45"></x-form-input>
                                </div>
                                <div class="flex-1 w-20 mt-1 ml-2">kg</div>
                            </div>
                        </div>
                        <x-form_error name="weight"></x-form_error>
                    </div>
                </div>

                <div class="flex flex-col space-y-7 pt-2 pr-4 vertical-line">
                    <div class="flex flex-col space-y-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <label for="height" class="pt-1">Height</label>
                            <div class="grid grid-cols-5">
                                <div class="col-span-4 flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                    <x-form-input type="number" name="height" id="height" :value="old('height')" placeholder="150"></x-form-input>
                                </div>
                                <div class="flex-1 w-20 mt-1 ml-2">cm</div>
                            </div>
                        </div>
                        <x-form_error name="height"></x-form_error>
                    </div>
                </div>

                <div class="flex flex-col space-y-7 pt-2 pr-4 vertical-line">
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <label for="gender" class="pt-2.5 pr-2.5">Gender</label>
                        <select id="gender" name="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <x-form_error name="gender"></x-form_error>
                </div>

                <div class="flex flex-col space-y-7 pt-2 pr-4 vertical-line">
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <label for="blood" class="pt-2.5 pr-2.5">Blood</label>
                        <select id="blood" name="blood" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                            <option>A</option>
                            <option>B</option>
                            <option>O</option>
                            <option>AB</option>
                        </select>
                    </div>
                    <x-form_error name="blood"></x-form_error>
                </div>

                <hr class="col-span-2 border-black/25 mt-4">
                <!-- NRC Section Start -->

                <div class="input-section col-span-2">
                    <div class="flex flex-col space-y-2">
                        <label>
                            <i class="fa-regular fa-address-card" style="color: #3575fe;"></i> NRC Card Number
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mt-4">
                            <div>
                                <select id="firstSelect" name="state" onchange="updateSecondSelect()" class="w-full py-2 px-3 border border-gray-300 bg-white rounded-md">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                </select>
                            </div>
                            <div>
                                <select id="secondSelect" name="city" class="w-full py-2 px-3 border border-gray-300 bg-white rounded-md">
                                    <!-- Options will be dynamically added here -->
                                </select>
                            </div>
                            <div>
                                <select id="thirdSelect" name="citizen" class="w-full py-2 px-3 border border-gray-300 bg-white rounded-md ">
                                    <option value="(နိုင်)">နိုင်</option>
                                    <option value="(ဧည့်)">ဧည့်</option>
                                    <option value="(ပြု)">ပြု</option>
                                    <option value="(သာသနာ)">သာသနာ</option>
                                    <option value="(ယာယီ)">ယာယီ</option>
                                </select>
                            </div>
                            <div>
                                <input type="text" placeholder="NRC number" name="NRCnumber" id="patientNRC" required class="text-sm text-gray-900 placeholder-gray-400 w-full py-2 px-3 border border-gray-300 bg-white rounded-md"/>
                            </div>
                        </div>
                        <x-form_error name="NRCnumber" />
                    </div>
                </div>
                <!-- NRC Section End -->
                <hr class="col-span-2 border-black/25 mt-4">
                <div class="button-container col-span-2 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="button" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-2 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 transform hover:-translate-y-[1.5px] transition-transform duration-500 ease-in-out">
                        Cancel
                    </button>
                    <button type="submit" class="text-white bg-gradient-to-tr from-customGreen2 to-customGreen3 shadow-lg shadow-gray-300 hover:bg-gradient-to-bl focus:ring-2 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 transform hover:-translate-y-[1.5px] transition-transform duration-500 ease-in-out">
                        Sign Up
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    function previewAvatar() {
        const fileInput = document.getElementById('photo');
        const avatarPreview = document.getElementById('avatarPreview');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            avatarPreview.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateSecondSelect(); // Call this function when the page loads
    });

    function updateSecondSelect() {
        var firstSelect = document.getElementById("firstSelect");
        var secondSelect = document.getElementById("secondSelect");

        // Clear existing options
        secondSelect.innerHTML = "";

        // Get the selected option from the first select
        var selectedRegion = firstSelect.value;

        // Add options to the second select based on the selected fruit
        if (selectedRegion === "1") {
            addOption(secondSelect, "ကမန", "ကမန");
            addOption(secondSelect, "ကပတ", "ကပတ");
            addOption(secondSelect, "ခဘဒ", "ခဘဒ");
            addOption(secondSelect, "ခဖန", "ခဖန");
            addOption(secondSelect, "ခလဖ", "ခလဖ");
            addOption(secondSelect, "ဂယ", "အဂယ");
            addOption(secondSelect, "ဒဖယ", "ဒဖယ");
            addOption(secondSelect, "နမန", "နမန");
            addOption(secondSelect, "ပနဒ", "ပနဒ");
            addOption(secondSelect, "ပ၀န", "ပ၀န");
            addOption(secondSelect, "ဖကန", "ဖကန");
            addOption(secondSelect, "ဗမန", "ဗမန");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မကတ", "မကတ");
            addOption(secondSelect, "မခဘ", "မခဘ");
            addOption(secondSelect, "မလန", "မလန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "မညန", "မညန");
            addOption(secondSelect, "မစန", "မစန");
            addOption(secondSelect, "ရကန", "ရကန");
            addOption(secondSelect, "ရဘယ", "ရဘယ");
            addOption(secondSelect, "ဆပဘ", "ဆပဘ");
            addOption(secondSelect, "ဆဘန", "ဆဘန");
            addOption(secondSelect, "ဆဒန", "ဆဒန");
            addOption(secondSelect, "ဆလန", "ဆလန");
            addOption(secondSelect, "တနန", "တနန");
            addOption(secondSelect, "၀မန", "၀မန");
            addOption(secondSelect, "ဟပန", "ဟပန");
        } else if (selectedRegion === "2") {
            addOption(secondSelect, "ဒမဆ", "ဒမဆ");
            addOption(secondSelect, "ဖဆန", "ဖဆန");
            addOption(secondSelect, "ဖရဆ", "ဖရဆ");
            addOption(secondSelect, "ဘလခ", "ဘလခ");
            addOption(secondSelect, "မဆန", "မဆန");
            addOption(secondSelect, "ရတန", "ရတန");
            addOption(secondSelect, "ရသန", "ရသန");
            addOption(secondSelect, "လကန", "လကန");
        } else if (selectedRegion === "3") {
            addOption(secondSelect, "ကကရ", "ကကရ");
            addOption(secondSelect, "ကဆက", "ကဆက");
            addOption(secondSelect, "ကဒန", "ကဒန");
            addOption(secondSelect, "ကမမ", "ကမမ");
            addOption(secondSelect, "စကလ", "စကလ");
            addOption(secondSelect, "တတန", "တတန");
            addOption(secondSelect, "ပကန", "ပကန");
            addOption(secondSelect, "ဖပန", "ဖပန");
            addOption(secondSelect, "ဘကလ", "ဘကလ");
            addOption(secondSelect, "ဘဂလ", "ဘဂလ");
            addOption(secondSelect, "ဘအန", "ဘအန");
            addOption(secondSelect, "ဘသဆ", "ဘသဆ");
            addOption(secondSelect, "မဝတ", "မဝတ");
            addOption(secondSelect, "လဘန", "လဘန");
            addOption(secondSelect, "လသန", "လသန");
            addOption(secondSelect, "သတက", "သတက");
            addOption(secondSelect, "သတန", "သတန");
            addOption(secondSelect, "၀လမ", "၀လမ");
            addOption(secondSelect, "ရရသ", "ရရသ");
        } else if (selectedRegion === "4") {
            addOption(secondSelect, "ကပလ", "ကပလ");
            addOption(secondSelect, "တတန", "တတန");
            addOption(secondSelect, "တဇန", "တဇန");
            addOption(secondSelect, "ထတလ", "ထတလ");
            addOption(secondSelect, "ပလဝ", "ပလဝ");
            addOption(secondSelect, "ဖလန", "ဖလန");
            addOption(secondSelect, "မတန", "မတန");
            addOption(secondSelect, "မတပ", "မတပ");
            addOption(secondSelect, "ဗမန", "ဗမန");
            addOption(secondSelect, "ဟခန", "ဟခန");
        } else if (selectedRegion === "5") {
            addOption(secondSelect, "ကစန", "ကစန");
            addOption(secondSelect, "ကဆန", "ကဆန");
            addOption(secondSelect, "ကတန", "ကတန");
            addOption(secondSelect, "ကတ၀", "ကတ၀");
            addOption(secondSelect, "ကနန", "ကနန");
            addOption(secondSelect, "ကဘလ", "ကဘလ");
            addOption(secondSelect, "ကလန", "ကလန");
            addOption(secondSelect, "ကလတ", "ကလတ");
            addOption(secondSelect, "ကလထ", "ကလထ");
            addOption(secondSelect, "ခဥန", "ခဥန");
            addOption(secondSelect, "ခဥတ", "ခဥတ");
            addOption(secondSelect, "ခတန", "ခတန");
            addOption(secondSelect, "ဂမန", "ဂမန");
            addOption(secondSelect, "ငဇန", "ငဇန");
            addOption(secondSelect, "စကန", "စကန");
            addOption(secondSelect, "ဆလက", "ဆလက");
            addOption(secondSelect, "ဇမန", "ဇမန");
            addOption(secondSelect, "ညဥန", "ညဥန");
            addOption(secondSelect, "တကမ", "တကမ");
            addOption(secondSelect, "တဆန", "တဆန");
            addOption(secondSelect, "တမန", "တမန");
            addOption(secondSelect, "ထခန", "ထခန");
            addOption(secondSelect, "ဒပယ", "ဒပယ");
            addOption(secondSelect, "နယန", "နယန");
            addOption(secondSelect, "ပလန", "ပလန");
            addOption(secondSelect, "ပလဘ", "ပလဘ");
            addOption(secondSelect, "ပသက", "ပသက");
            addOption(secondSelect, "ဖပန", "ဖပန");
            addOption(secondSelect, "ဗမန", "ဗမန");
            addOption(secondSelect, "ဘတလ", "ဘတလ");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မလန", "မလန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "မရန", "မရန");
            addOption(secondSelect, "ယမပ", "ယမပ");
            addOption(secondSelect, "ရစက", "ရစက");
            addOption(secondSelect, "ရသက", "ရသက");
            addOption(secondSelect, "ရဘန", "ရဘန");
            addOption(secondSelect, "လခန", "လခန");
            addOption(secondSelect, "သဆန", "သဆန");
            addOption(secondSelect, "ဟမလ", "ဟမလ");
            addOption(secondSelect, "အတန", "အတန");
            addOption(secondSelect, "အရတ", "အရတ");
        } else if (selectedRegion === "6") {
            addOption(secondSelect, "ကမလ", "ကမလ");
            addOption(secondSelect, "ကနလ", "ကနလ");
            addOption(secondSelect, "ကစန", "ကစန");
            addOption(secondSelect, "ကသန", "ကသန");
            addOption(secondSelect, "ခမက", "ခမက");
            addOption(secondSelect, "ငရက", "ငရက");
            addOption(secondSelect, "တနသ", "တနသ");
            addOption(secondSelect, "တမက", "တမက");
            addOption(secondSelect, "တသရ", "တသရ");
            addOption(secondSelect, "ထဝန", "ထဝန");
            addOption(secondSelect, "ပလန", "ပလန");
            addOption(secondSelect, "ပမဒ", "ပမဒ");
            addOption(secondSelect, "ပနလ", "ပနလ");
            addOption(secondSelect, "ဘပန", "ဘပန");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "မလသ", "မလသ");
            addOption(secondSelect, "မအရ", "မအရ");
            addOption(secondSelect, "ရဖန", "ရဖန");
            addOption(secondSelect, "လလန", "လလန");
            addOption(secondSelect, "လဘန", "လဘန");
            addOption(secondSelect, "လသန", "လသန");
            addOption(secondSelect, "သနက", "သနက");
            addOption(secondSelect, "သရခ", "သရခ");
        } else if (selectedRegion === "7") {
            addOption(secondSelect, "ကကန", "ကကန");
            addOption(secondSelect, "ကကန", "ကကန");
            addOption(secondSelect, "ကတတ", "ကတတ");
            addOption(secondSelect, "ကတခ", "ကတခ");
            addOption(secondSelect, "ကတလ", "ကတလ");
            addOption(secondSelect, "ကနဒ", "ကနဒ");
            addOption(secondSelect, "ကပက", "ကပက");
            addOption(secondSelect, "ကဘန", "ကဘန");
            addOption(secondSelect, "ကရဘ", "ကရဘ");
            addOption(secondSelect, "ကလမ", "ကလမ");
            addOption(secondSelect, "ညလပ", "ညလပ");
            addOption(secondSelect, "ဒနဆ", "ဒနဆ");
            addOption(secondSelect, "ဒဥန", "ဒဥန");
            addOption(secondSelect, "နကမ", "နကမ");
            addOption(secondSelect, "နတလ", "နတလ");
            addOption(secondSelect, "နရစ", "နရစ");
            addOption(secondSelect, "ပခန", "ပခန");
            addOption(secondSelect, "ပခန", "ပခန");
            addOption(secondSelect, "ပတန", "ပတန");
            addOption(secondSelect, "ပတတ", "ပတတ");
            addOption(secondSelect, "ပတစ", "ပတစ");
            addOption(secondSelect, "ပနက", "ပနက");
            addOption(secondSelect, "ပမန", "ပမန");
            addOption(secondSelect, "ပရဒ", "ပရဒ");
            addOption(secondSelect, "ဖမန", "ဖမန");
            addOption(secondSelect, "ဗမန", "ဗမန");
            addOption(secondSelect, "ဘလက", "ဘလက");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မညန", "မညန");
            addOption(secondSelect, "မတန", "မတန");
            addOption(secondSelect, "မနယ", "မနယ");
            addOption(secondSelect, "မဖန", "မဖန");
            addOption(secondSelect, "မလန", "မလန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "မဒန", "မဒန");
            addOption(secondSelect, "ရကန", "ရကန");
            addOption(secondSelect, "ရကလ", "ရကလ");
            addOption(secondSelect, "ရတန", "ရတန");
            addOption(secondSelect, "ရတရ", "ရတရ");
            addOption(secondSelect, "လဘန", "လဘန");
            addOption(secondSelect, "လသန", "လသန");
            addOption(secondSelect, "၀မန", "၀မန");
            addOption(secondSelect, "သကန", "သကန");
            addOption(secondSelect, "သဆန", "သဆန");
            addOption(secondSelect, "သနပ", "သနပ");
            addOption(secondSelect, "သနမ", "သနမ");
            addOption(secondSelect, "သရခ", "သရခ");
            addOption(secondSelect, "သဝတ", "သဝတ");
            addOption(secondSelect, "ဟမန", "ဟမန");
            addOption(secondSelect, "အတန", "အတန");
            addOption(secondSelect, "အဖန", "အဖန");
            addOption(secondSelect, "အဖန", "အဖန");
        } else if (selectedRegion === "8") {

            addOption(secondSelect, "ကဒန", "ကဒန");
            addOption(secondSelect, "ကမန", "ကမန");
            addOption(secondSelect, "ကလန", "ကလန");
            addOption(secondSelect, "ကရဘ", "ကရဘ");
            addOption(secondSelect, "ခမန", "ခမန");
            addOption(secondSelect, "ဂဂန", "ဂဂန");
            addOption(secondSelect, "ငဖန", "ငဖန");
            addOption(secondSelect, "ဆမန", "ဆမန");
            addOption(secondSelect, "ဆပဝ", "ဆပဝ");
            addOption(secondSelect, "ဆဖန", "ဆဖန");
            addOption(secondSelect, "စကန", "စကန");
            addOption(secondSelect, "စကလ", "စကလ");
            addOption(secondSelect, "စတရ", "စတရ");
            addOption(secondSelect, "စလန", "စလန");
            addOption(secondSelect, "တတက", "တတက");
            addOption(secondSelect, "တလမ", "တလမ");
            addOption(secondSelect, "ထလန", "ထလန");
            addOption(secondSelect, "နကမ", "နကမ");
            addOption(secondSelect, "နမန", "နမန");
            addOption(secondSelect, "နရဆ", "နရဆ");
            addOption(secondSelect, "ပခက", "ပခက");
            addOption(secondSelect, "ပမန", "ပမန");
            addOption(secondSelect, "ပရဒ", "ပရဒ");
            addOption(secondSelect, "ပဖန", "ပဖန");
            addOption(secondSelect, "ဘနမ", "ဘနမ");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မတန", "မတန");
            addOption(secondSelect, "မထန", "မထန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "မမလ", "မမလ");
            addOption(secondSelect, "မဘန", "မဘန");
            addOption(secondSelect, "မလန", "မလန");
            addOption(secondSelect, "မသန", "မသန");
            addOption(secondSelect, "ရကလ", "ရကလ");
            addOption(secondSelect, "ရစက", "ရစက");
            addOption(secondSelect, "ရနခ", "ရနခ");
            addOption(secondSelect, "ရမတ", "ရမတ");
            addOption(secondSelect, "လဘန", "လဘန");
            addOption(secondSelect, "လရက", "လရက");
            addOption(secondSelect, "သရန", "သရန");
            addOption(secondSelect, "အလန", "အလန");
            addOption(secondSelect, "ဧရက", "ဧရက");
        } else if (selectedRegion === "9") {
            addOption(secondSelect, "ဉတသ", "ဉတသ");
            addOption(secondSelect, "ညဥန", "ညဥန");
            addOption(secondSelect, "တကန", "တကန");
            addOption(secondSelect, "တတဥ", "တတဥ");
            addOption(secondSelect, "တသန", "တသန");
            addOption(secondSelect, "ဒခသ", "ဒခသ");
            addOption(secondSelect, "နထက", "နထက");
            addOption(secondSelect, "ပကခ", "ပကခ");
            addOption(secondSelect, "ပဗသ", "ပဗသ");
            addOption(secondSelect, "ပမန", "ပမန");
            addOption(secondSelect, "ပမန", "ပမန");
            addOption(secondSelect, "ပလန", "ပလန");
            addOption(secondSelect, "ပသက", "ပသက");
            addOption(secondSelect, "ပဖန", "ပဖန");
            addOption(secondSelect, "ပဥလ", "ပဥလ");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မခန", "မခန");
            addOption(secondSelect, "မဂန", "မဂန");
            addOption(secondSelect, "မထလ", "မထလ");
            addOption(secondSelect, "မတရ", "မတရ");
            addOption(secondSelect, "မနတ", "မနတ");
            addOption(secondSelect, "မနမ", "မနမ");
            addOption(secondSelect, "မဟမ", "မဟမ");
            addOption(secondSelect, "မရမ", "မရမ");
            addOption(secondSelect, "မရတ", "မရတ");
            addOption(secondSelect, "မလန", "မလန");
            addOption(secondSelect, "မသန", "မသန");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "ရမသ", "ရမသ");
            addOption(secondSelect, "လဝန", "လဝန");
            addOption(secondSelect, "သစန", "သစန");
            addOption(secondSelect, "သပက", "သပက");
            addOption(secondSelect, "အမရ", "အမရ");
            addOption(secondSelect, "အမဇ", "အမဇ");
            addOption(secondSelect, "ဓကန", "ဓကန");
            addOption(secondSelect, "ငသရ", "ငသရ");
            addOption(secondSelect, "ခအစ", "ခအစ");
            addOption(secondSelect, "ခမစ", "ခမစ");
            addOption(secondSelect, "ဆကန", "ဆကန");
            addOption(secondSelect, "ဇဗသ", "ဇဗသ");
            addOption(secondSelect, "ဇယသ", "ဇယသ");
            addOption(secondSelect, "ဝတန", "ဝတန");
            addOption(secondSelect, "စကတ", "စကတ");
            addOption(secondSelect, "ဓကန", "ဓကန");
        } else if (selectedRegion === "10") {

            addOption(secondSelect, "ကလန", "ကလန");
            addOption(secondSelect, "ကမရ", "ကမရ");
            addOption(secondSelect, "ကရဘ", "ကရဘ");
            addOption(secondSelect, "ကထန", "ကထန");
            addOption(secondSelect, "ခဇန", "ခဇန");
            addOption(secondSelect, "ခဆန", "ခဆန");
            addOption(secondSelect, "စဘန", "စဘန");
            addOption(secondSelect, "တကလ", "တကလ");
            addOption(secondSelect, "နကမ", "နကမ");
            addOption(secondSelect, "နရစ", "နရစ");
            addOption(secondSelect, "ပမန", "ပမန");
            addOption(secondSelect, "ဘလန", "ဘလန");
            addOption(secondSelect, "ဘရဒ", "ဘရဒ");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မဒန", "မဒန");
            addOption(secondSelect, "မလမ", "မလမ");
            addOption(secondSelect, "ရကတ", "ရကတ");
            addOption(secondSelect, "ရမန", "ရမန");
            addOption(secondSelect, "ရဒန", "ရဒန");
            addOption(secondSelect, "သကလ", "သကလ");
            addOption(secondSelect, "သထန", "သထန");
            addOption(secondSelect, "သဖရ", "သဖရ");
            addOption(secondSelect, "လမန", "လမန");
            addOption(secondSelect, "လမန", "လမန");
        } else if (selectedRegion === "11") {
            addOption(secondSelect, "ကတန", "ကတန");
            addOption(secondSelect, "ကဘန", "ကဘန");
            addOption(secondSelect, "ကဖန", "ကဖန");
            addOption(secondSelect, "ကရဘ", "ကရဘ");
            addOption(secondSelect, "ဂမန", "ဂမန");
            addOption(secondSelect, "စတန", "စတန");
            addOption(secondSelect, "ဆကန", "ဆကန");
            addOption(secondSelect, "တကန", "တကန");
            addOption(secondSelect, "တလမ", "တလမ");
            addOption(secondSelect, "ဒနမ", "ဒနမ");
            addOption(secondSelect, "နကမ", "နကမ");
            addOption(secondSelect, "နရဆ", "နရဆ");
            addOption(secondSelect, "ပဏက", "ပဏက");
            addOption(secondSelect, "ပတန", "ပတန");
            addOption(secondSelect, "ပဘန", "ပဘန");
            addOption(secondSelect, "ဘသတ", "ဘသတ");
            addOption(secondSelect, "ဘလန", "ဘလန");
            addOption(secondSelect, "မအန", "မအန");
            addOption(secondSelect, "မတန", "မတန");
            addOption(secondSelect, "မပန", "မပန");
            addOption(secondSelect, "မဥန", "မဥန");
            addOption(secondSelect, "မပတ", "မပတ");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "ရကလ", "ရကလ");
            addOption(secondSelect, "ရဗန", "ရဗန");
            addOption(secondSelect, "ရသတ", "ရသတ");
            addOption(secondSelect, "လဘန", "လဘန");
            addOption(secondSelect, "လရက", "လရက");
            addOption(secondSelect, "သတန", "သတန");
        } else if (selectedRegion === "12") {
            addOption(secondSelect, "ကကက", "ကကက");
            addOption(secondSelect, "ကခက", "ကခက");
            addOption(secondSelect, "ကတတ", "ကတတ");
            addOption(secondSelect, "ကတန", "ကတန");
            addOption(secondSelect, "ကမန", "ကမန");
            addOption(secondSelect, "ကမရ", "ကမရ");
            addOption(secondSelect, "ကမတ", "ကမတ");
            addOption(secondSelect, "ဒဂန", "ဒဂန");
            addOption(secondSelect, "ဒဂတ", "ဒဂတ");
            addOption(secondSelect, "ဒဂမ", "ဒဂမ");
            addOption(secondSelect, "ဒဂရ", "ဒဂရ");
            addOption(secondSelect, "ဒဆက", "ဒဆက");
            addOption(secondSelect, "ဒပန", "ဒပန");
            addOption(secondSelect, "ဒလန", "ဒလန");
            addOption(secondSelect, "ဒတယ", "ဒတယ");
            addOption(secondSelect, "စခန", "စခန");
            addOption(secondSelect, "စကန", "စကန");
            addOption(secondSelect, "ဆကခ", "ဆကခ");
            addOption(secondSelect, "ထတပ", "ထတပ");
            addOption(secondSelect, "တကန", "တကန");
            addOption(secondSelect, "တမန", "တမန");
            addOption(secondSelect, "တတန", "တတန");
            addOption(secondSelect, "တတထ", "တတထ");
            addOption(secondSelect, "သကတ", "သကတ");
            addOption(secondSelect, "သခန", "သခန");
            addOption(secondSelect, "သလန", "သလန");
            addOption(secondSelect, "သဃက", "သဃက");
            addOption(secondSelect, "လကန", "လကန");
            addOption(secondSelect, "လမန", "လမန");
            addOption(secondSelect, "လမတ", "လမတ");
            addOption(secondSelect, "လသန", "လသန");
            addOption(secondSelect, "လသယ", "လသယ");
            addOption(secondSelect, "မဘန", "မဘန");
            addOption(secondSelect, "မဂတ", "မဂတ");
            addOption(secondSelect, "မဂဒ", "မဂဒ");
            addOption(secondSelect, "မရက", "မရက");
            addOption(secondSelect, "ဥကမ", "ဥကမ");
            addOption(secondSelect, "ဥကတ", "ဥကတ");
            addOption(secondSelect, "ပဘတ", "ပဘတ");
            addOption(secondSelect, "ပဇတ", "ပဇတ");
            addOption(secondSelect, "ရကန", "ရကန");
            addOption(secondSelect, "ရပက", "ရပက");
            addOption(secondSelect, "ရပသ", "ရပသ");

        } else if (selectedRegion === "13") {

            addOption(secondSelect, "ကခန", "ကခန");
            addOption(secondSelect, "ကခလ", "ကခလ");
            addOption(secondSelect, "ကကန", "ကကန");
            addOption(secondSelect, "ကလန", "ကလန");
            addOption(secondSelect, "ကလတ", "ကလတ");
            addOption(secondSelect, "ကလထ", "ကလထ");
            addOption(secondSelect, "ကမန", "ကမန");
            addOption(secondSelect, "ကဟန", "ကဟန");
            addOption(secondSelect, "ကတတ", "ကတတ");
            addOption(secondSelect, "ကတန", "ကတန");
            addOption(secondSelect, "ကသန", "ကသန");
            addOption(secondSelect, "ညရန", "ညရန");
            addOption(secondSelect, "တကန", "တကန");
            addOption(secondSelect, "တခလ", "တခလ");
            addOption(secondSelect, "တတန", "တတန");
            addOption(secondSelect, "တယန", "တယန");
            addOption(secondSelect, "တလန", "တလန");
            addOption(secondSelect, "တမည", "တမည");
            addOption(secondSelect, "နခန", "နခန");
            addOption(secondSelect, "နခတ", "နခတ");
            addOption(secondSelect, "နစန", "နစန");
            addOption(secondSelect, "နတရ", "နတရ");
            addOption(secondSelect, "နမတ", "နမတ");
            addOption(secondSelect, "ပတယ", "ပတယ");
            addOption(secondSelect, "ပပက", "ပပက");
            addOption(secondSelect, "ပလန", "ပလန");
            addOption(secondSelect, "ပဝန", "ပဝန");
            addOption(secondSelect, "ဖခန", "ဖခန");
            addOption(secondSelect, "မကန", "မကန");
            addOption(secondSelect, "မခန", "မခန");
            addOption(secondSelect, "မခတ", "မခတ");
            addOption(secondSelect, "မငန", "မငန");
            addOption(secondSelect, "မဆန", "မဆန");
            addOption(secondSelect, "မဆတ", "မဆတ");
            addOption(secondSelect, "မတတ", "မတတ");
            addOption(secondSelect, "မထန", "မထန");
            addOption(secondSelect, "မနန", "မနန");
            addOption(secondSelect, "မပတ", "မပတ");
            addOption(secondSelect, "မဖန", "မဖန");
            addOption(secondSelect, "မဘန", "မဘန");
            addOption(secondSelect, "မယတ", "မယတ");
            addOption(secondSelect, "မရန", "မရန");
            addOption(secondSelect, "မမတ", "မမတ");
            addOption(secondSelect, "ရငန", "ရငန");
            addOption(secondSelect, "ရစန", "ရစန");
            addOption(secondSelect, "ရညန", "ရညန");
            addOption(secondSelect, "လကန", "လကန");
            addOption(secondSelect, "လခန", "လခန");
            addOption(secondSelect, "လခတ", "လခတ");
            addOption(secondSelect, "လလန", "လလန");
            addOption(secondSelect, "လရန", "လရန");
            addOption(secondSelect, "သနန", "သနန");
            addOption(secondSelect, "သပန", "သပန");
            addOption(secondSelect, "အပန", "အပန");
            addOption(secondSelect, "ဟဟန", "ဟဟန");
            addOption(secondSelect, "ဟပတ", "ဟပတ");
            addOption(secondSelect, "ဟမန", "ဟမန");
            addOption(secondSelect, "ဆဆန", "ဆဆန");
        } else if (selectedRegion === "14") {
            addOption(secondSelect, "ကကန", "ကကန");
            addOption(secondSelect, "ကကထ", "ကကထ");
            addOption(secondSelect, "ကခန", "ကခန");
            addOption(secondSelect, "ကနန", "ကနန");
            addOption(secondSelect, "ကပန", "ကပန");
            addOption(secondSelect, "ကလန", "ကလန");
            addOption(secondSelect, "ငဆန", "ငဆန");
            addOption(secondSelect, "ငပတ", "ငပတ");
            addOption(secondSelect, "ငရက", "ငရက");
            addOption(secondSelect, "ငသခ", "ငသခ");
            addOption(secondSelect, "ညတန", "ညတန");
            addOption(secondSelect, "ဇလန", "ဇလန");
            addOption(secondSelect, "ဓနဖ", "ဓနဖ");
            addOption(secondSelect, "ဒဒရ", "ဒဒရ");
            addOption(secondSelect, "ပတန", "ပတန");
            addOption(secondSelect, "ပသန", "ပသန");
            addOption(secondSelect, "ပသအ", "ပသအ");
            addOption(secondSelect, "ပသရ", "ပသရ");
            addOption(secondSelect, "ပသရ", "ပသရ");
            addOption(secondSelect, "ပစလ", "ပစလ");
            addOption(secondSelect, "ဖပန", "ဖပန");
            addOption(secondSelect, "ဘကလ", "ဘကလ");
            addOption(secondSelect, "မအန", "မအန");
            addOption(secondSelect, "မအပ", "မအပ");
            addOption(secondSelect, "မမက", "မမက");
            addOption(secondSelect, "မမန", "မမန");
            addOption(secondSelect, "လပတ", "လပတ");
            addOption(secondSelect, "လမန", "လမန");
            addOption(secondSelect, "သပန", "သပန");
            addOption(secondSelect, "ဟကက", "ဟကက");
            addOption(secondSelect, "ဟသတ", "ဟသတ");
            addOption(secondSelect, "အဂပ", "အဂပ");
            addOption(secondSelect, "အမတ", "အမတ");
            addOption(secondSelect, "အမန", "အမန");
            addOption(secondSelect, "ယသရ", "ယသရ");
            addOption(secondSelect, "ရကန", "ရကန");
            addOption(secondSelect, "ဝခမ", "ဝခမ");
        }
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement("option");
        option.value = value;
        option.text = text;
        selectElement.add(option);
    }
</script>
</body>
</html>
