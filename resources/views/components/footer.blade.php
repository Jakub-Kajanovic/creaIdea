<footer class="container mx-auto px-4 border-t border-black flex flex-col items-center">
    <h2 class="text-center pt-40">Tu ma zastihnete</h2>
    <div
        class="flex flex-wrap lg:grid  lg:grid-cols-4  gap-8 justify-center py-10">
        <x-footer-card>
            <img class="w-16" src="{{ asset('images/phone.png') }}" alt="">
            <h3>telefón</h3>
            <div class="flex border-l border-gray-400 flex-col space-y-2 px-4 mt-4">
                <a class="footer-menu" href="tel:421908984532">+421 908 984 532</a>
            </div>
        </x-footer-card>
        <x-footer-card>
            <img class="w-16" src="{{ asset('images/location.png') }}" alt="">
            <h3>kancelária</h3>
            <div class="flex border-l border-gray-400 flex-col space-y-2 px-4 mt-4">
                <div class="footer-menu">sučianska 31 Martin</div>
            </div>
        </x-footer-card>
        <x-footer-card>
            <img class="w-16" src="{{ asset('images/email.png') }}" alt="">
            <h3>E-mail</h3>
            <div class="flex border-l border-gray-400 flex-col space-y-2 px-4 mt-4">
                <a class="footer-menu" href="mailto:cridslovakia@gmail.com">cridslovakia@gmail.com</a>
            </div>
        </x-footer-card>
        <x-footer-card>
            <img class="w-16" src="{{ asset('images/social.png') }}" alt="">
            <h3>socky</h3>
            <div class="flex flex-row space-x-2 border-l border-gray-400 px-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61563497834690" target="_blank"
                    class="bg-gray-200 px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                        class='bx bxl-facebook group-hover:text-white text-xl'></i></a>
                <a href="https://www.linkedin.com/in/gabriela-kederov%C3%A1-9336306a/" target="_blank"
                    class="bg-gray-200 px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                        class='bx bxl-linkedin group-hover:text-white text-xl'></i></a>
                <a href="https://www.instagram.com/creaidea.sk/" target="_blank"
                    class="bg-gray-200 px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                        class='bx bxl-instagram group-hover:text-white text-xl'></i></a>
            </div>
        </x-footer-card>
    </div>
    <div class="bg-white rounded-t-3xl w-full p-10 flex flex-row justify-between">
        <p class="text-left">
            © {{ date('Y') }} Crea Idea
        </p>
        <a class="text-right" href="https://www.irubiq.com" target="_blank">
            Developed by <strong>IRUBIQ</strong>
        </a>
    </div>
</footer>
