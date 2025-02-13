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
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Register</h3>
                            </div>
                            <div class="card-body">
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" type="text" placeholder="Nama Lengkap" autofocus
                                            required />
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control  @error('username') is-invalid @enderror"
                                            id="username" name="username" type="text" placeholder="Username"
                                            autofocus required />
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" type="email" placeholder="name@example.com" autofocus
                                            required />
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" type="password" placeholder="Password"
                                            required />
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select id="role" name="role"
                                            class="form-select @error('role') is-invalid @enderror">
                                            <option>Pilih</option>
                                            <option>Instruktur</option>
                                            <option>Murid</option>
                                        </select>
                                        <label for="role">Pilih Role</label>
                                    </div>
                                    <button class="btn btn-primary float-right" type="submit">Registrasi</button>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/login">Sudah punya akun? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('partials.footer')
