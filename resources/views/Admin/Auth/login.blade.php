<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ config('app.asset_url') }}assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ config('app.asset_url') }}assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ config('app.asset_url') }}assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <script src="{{ config('app.asset_url') }}assets/js/jquery-4.0.0.min.js"></script>
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div
                            class="flex-col justify-center hidden w-6/12 h-auto max-w-full px-3 pr-0 text-center flex-0 lg:flex">
                            <div
                                class="relative flex flex-col justify-center h-full bg-cover mx-4 mt-6 px-24 overflow-hidden bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg')] rounded-xl ">
                                <span
                                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                                <h4 class="z-20 mt-12 font-bold text-white">"Attention is the new currency"</h4>
                                <p class="z-20 text-white ">The more effortless the writing looks, the more effort the
                                    writer actually put into the process.</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 sm:w-full lg:w-1/2 pt-6">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form" id="loginForm">
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" name="email" id="email"
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                <p class="text-[14px] font-bold text-red-500 ms-1 hidden" id="emailError">fffffff</p>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" name ="password"
                                                id="password"
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            <p class="text-[14px] font-bold text-red-500 ms-1 hidden" id="passwordError"></p>
                                        </div>
                                        <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                            <input id="rememberMe" name="remember_me"
                                                class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                                                type="checkbox" />
                                            <label
                                                class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700"
                                                for="rememberMe">Remember me</label>
                                        </div>
                                        <!-- Error Message -->
                                        <div
                                            id="errorMessage"
                                            class="flex items-center gap-3 rounded-lg border border-red-200 bg-transparent px-2 py-2 mt-4 hidden">
                                                <p class="text-[16px] text-red-500">
                                                    
                                                </p>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                    <p class="mx-auto mb-6 leading-normal text-sm">Don't remember your password? <a
                                            href="../pages/forgot-password.html"
                                            class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Forgot Password</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="py-12">
        <div class="container">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Company
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Team </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Products
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Pricing
                    </a>
                </div>
                <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Argon Dashboard 2 by Creative Tim.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

<script>
    $(document).ready(function() {
        // Intercept the form submit event
        $('#loginForm').on('submit', function(event) {
            event.preventDefault();

            const formDataSerialized = $(this).serializeArray();

            const formDataObject = {};

            $.each(formDataSerialized, function(i, field) {
                formDataObject[field.name] = field.value;
            });

            formDataObject['remember_me'] = $('#rememberMe').is(':checked');

            $.ajax({
                url: "{{ route('admin.verify_login') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                data: formDataObject,
                success: function(response) {
                    
                    $('#emailError').text("").addClass('hidden');
                    $('#passwordError').text("").addClass('hidden');
                    $('#errorMessage').addClass('hidden');
                    if(response.status === 1){
                        window.location.href = "{{ route('admin.dashboard') }}";
                    }else if(response.status === 2){
                        $('#emailError').text(response.message).removeClass('hidden');
                    }else if(response.status === 3){
                        $('#passwordError').text(response.message).removeClass('hidden');
                    }else{
                        $('#errorMessage p').text(response.message);
                        $('#errorMessage').removeClass('hidden');
                    }
                },
                error: function(error) {
                    $('#errorMessage p').text(error.responseJSON.message || "Something went wrong!. Please try again.");
                    $('#errorMessage').removeClass('hidden');
                }
            });
        });
    });
</script>
<!-- plugin for scrollbar  -->
<script src="{{ config('app.asset_url') }}assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script
    src="{{ config('app.asset_url') }}assets/js/argon-dashboard-tailwind.js?v=1.0.1&asset_url={{ config('app.asset_url') }}"
    async></script>

</html>
