<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin DashBoard - CreaIdea</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="px-2">
    <div class="container-admin flex flex-row gap-10">
        <x-flash/>
        <div class="sidebar active">
            <div class="menu-btn">
                <i class="ph-bold ph-caret-left"></i>
            </div>
            <div class="head">
                <div class="user-img">
                    <img src="{{ asset('images/logo-creaidea.svg') }}" alt="Logo CreaIdea">
                </div>
                <div class="user-details">
                    <p class="title">Admin name:</p>
                    <p class="name">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <div class="nav">
                <div class="menu">
                    <p class="title">Main</p>
                    <ul>
                        <li class="active">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="icon ph-bold ph-house-simple"></i>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon ph-bold ph-user"></i>
                                <span class="text">Users</span>
                                <i class="arrow ph-bold ph-caret-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('users.index')}}">
                                        <span class="text">Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="text">Subscribers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('blog.index')}}">
                                <i class="icon ph-bold ph-file-text"></i>
                                <span class="text">Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.form-submissions')}}">
                                <i class="icon ph-bold ph-calendar-blank"></i>
                                <span class="text">Schedules</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon ph-bold ph-chart-bar"></i>
                                <span class="text">Tags & Category</span>
                                <i class="arrow ph-bold ph-caret-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('tags.index')}}">
                                        <span class="text">Tag</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('categories.index')}}">
                                        <span class="text">Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="menu">
                    <p class="title">Settings</p>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="icon ph-bold ph-gear"></i>
                                <span class="text">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="content my-2 bg-white rounded-3xl p-4 w-full">
            {{ $slot }}
        </div>
    </div>
    <div class="logout-button absolute bottom-0 left-0 m-4">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex items-center text-gray-800 hover:text-red-600">
                <i class="icon ph-bold ph-sign-out mr-2"></i>
                <span class="text">Logout</span>
            </a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/admin-navbar.js') }}"></script>
         <!-- Pridanie Trumbowyg cez CDN -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/plugins/upload/trumbowyg.upload.min.js"></script>
     
         <script>
             $(document).ready(function() {
                 $('#content').trumbowyg({
                     btns: [
                         ['viewHTML'],
                         ['formatting'],
                         ['bold', 'italic', 'underline', 'strikethrough'],
                         ['link'],
                         ['insertImage'],
                         ['unorderedList', 'orderedList'],
                         ['removeformat'],
                         ['fullscreen']
                     ],
                     plugins: {
                         upload: {
                             serverPath: '{{ route("blog.upload_image") }}',
                             fileFieldName: 'image',
                             headers: {
                                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                             },
                             urlPropertyName: 'location'
                         }
                     }
                 });
             });
         </script>
</body>

</html>
