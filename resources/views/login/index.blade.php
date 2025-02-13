@include('partials.headlogin')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h3 class="text-center  alert alert-success font-weight-light mt-4">Selamat Datang di
                            FreeTime Courses</h3>
                        <div class="card shadow-lg border-0 rounded-lg">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email"
                                            placeholder="name@example.com" @error('email') is-invalid @enderror
                                            autofocus required />
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="btn btn-primary float-right" type="submit">Login</button>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/register">Belum Punya Akun? Daftar!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('partials.footer')
