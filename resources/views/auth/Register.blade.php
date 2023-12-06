<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <!-- LOGIN -->
    <div class="min-h-full px-6 py-12 lg:px-8">
        <div class="shadow-2xl md:w-1/3 mx-auto p-4 relative">
            {{-- button close --}}
            <a href="/">
                <span class="text-2xl absolute bg-violet-500 rounded-full w-8 h-8 top-4 right-4 text-white flex justify-center items-center">X</span>
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            </a>

              <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up to your account</h2>
            </div>
      
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <form class="space-y-6" action="#" method="POST">
                  {{-- email --}}
                  <div>
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                      <div class="mt-2">
                        <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                    </div>
      
                  {{-- username --}}
                <div>
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
      
                {{-- password --}}
                <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
      
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</button>
                </div>
              </form>
            </div>

            <div class="my-2 mx-4 flex justify-center">
                <p>Already have account? <a href="/login">Sign in</a></p>
            </div>
        </div>
    </div>


</div>
</body>
</html>