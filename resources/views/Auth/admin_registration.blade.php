<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    <title>FitFinity | Registration Form</title>
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
<body class="custom-font">
<div class="min-h-screen w-full flex flex-col place-content-center items-center justify-center bg-teal-50">
    <div class="my-14 customXS:m-6 sm:m-10">
        <h1 class="mb-1 font-bold text-customGreen2 text-3xl flex gap-1 items-baseline custom-font">Admin Registration Form <span class="text-sm text-customGreen3 pl-2"> FITFINITY </span></h1>

        <form action="/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-container grid max-w-2xl gap-4 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-[6px] border-customGreen3 shadow-custom">
                <div class="flex flex-col space-y-7 sm:pr-4 sm:vertical-line pb-2">
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col sm:flex-row items-center space-x-6">
                            <label for="admin_name" class="pt-1">Name</label>
                            <div class="flex-1 bg-white flex max-h-10 flex-col-reverse justify-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                <x-form-input type="text" name="admin_name" id="admin_name" :value="old('username')" placeholder="someone"> </x-form-input>
                            </div>
                        </div>
                        <x-form_error name="admin_name" />
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
                </div>

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
</script>
</body>
</html>
