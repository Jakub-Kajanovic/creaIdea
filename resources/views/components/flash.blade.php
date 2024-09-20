<!-- Success and Error Notification -->
@if (session('success'))
    <div id="success-message" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-4 py-2 rounded-md shadow-md">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="error-message" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-100 text-red-800 px-4 py-2 rounded-md shadow-md">
        {{ session('error') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0'; 
                setTimeout(() => successMessage.remove(), 500); 
            }, 3000); 
        }
        const errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(function () {
                errorMessage.style.transition = 'opacity 0.5s ease'; 
                errorMessage.style.opacity = '0'; 
                setTimeout(() => errorMessage.remove(), 500); 
            }, 3000); 
        }
    });
</script>
