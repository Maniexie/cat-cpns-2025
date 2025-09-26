<x-auth-layouts title="Register">
         <x-slot:title>
                 Register
            </x-slot>
            <div class="container border">
                <div class="form">
                    <form  method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="border" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="border" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="border" name="password" id="password">
                        </div>
                        <button type="submit" class="background-sky-500">Submit</button>
                    </form>
                </div>
            </div>
            </h1>
</x-auth-layouts>
