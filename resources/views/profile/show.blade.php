{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.dashboard-master')

@section('title', 'Profile')

@section('content')
    @include('layouts.components-alert')

    <div class="row d-flex align-items-stretch" style="height: 100%;">
        <div class="col-4">
            <div class="card h-100">
                <div class="text-center card-body" style="max-height: 500px; overflow-y: auto;">
                    <div>
                        <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('assets/images/users/profile-default.png') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"
                            style="width: 150px; height: 150px;">

                        <div class="text-start mt-2">
                            <p class="text-muted font-13">
                                <strong>Full Name :</strong> <span class="ms-2">{{ $user->name }}</span>
                            </p>
                            <p class="text-muted font-13">
                                <strong>Phone :</strong><span class="ms-2">{{ $user->phone }}</span>
                            </p>
                            <p class="text-muted font-13">
                                <strong>Email :</strong> <span class="ms-2">{{ $user->email }}</span>
                            </p>
                            <p class="text-muted font-13">
                                <strong>Address :</strong> <span class="ms-2">{{ $user->address }}</span>
                            </p>
                        </div>

                        <div class="">
                            <form action="{{ route('dashboard.profile.uploadPhoto', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="profile_photo" accept="image/*" class="form-control mt-2">
                                <button type="submit"
                                    class="btn btn-primary rounded-pill waves-effect waves-light mt-2">Upload Foto</button>
                            </form>
                            <form action="{{ route('dashboard.profile.deletePhoto', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-primary rounded-pill waves-effect waves-light mt-2">Hapus Foto</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card h-100">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered">
                        <li class="nav-item">
                            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                Profile Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#password-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                Password Setting
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile-b1" style="max-height: 300px; overflow-y: auto;">
                            <form action="{{ route('dashboard.profile.update', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input pattern="[^0-9]+" required oninput="this.value=this.value.replace(/[0-9]/g,'');"
                                        type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                        class="form-control form-control-sm" placeholder="placeholder">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control form-control-sm"
                                        placeholder="placeholder" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control form-control-sm"
                                        placeholder="placeholder" value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" class="form-control form-control-sm" name="gender" required>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control form-control-sm" placeholder="Enter your address"
                                        rows="3">{{ old('address', $user->address) }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-success rounded-pill waves-effect waves-light">Update
                                        Profile</button>
                                    <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light"
                                        onclick="location.reload();">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="password-b1" style="max-height: 300px; overflow-y: auto;">
                            <form action="{{ route('dashboard.profile.updatePassword', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control form-control-sm" placeholder="Current Password" required>
                                    @error('current_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control form-control-sm" placeholder="New Password" required>
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" id="new_password_confirmation"
                                        name="new_password_confirmation" class="form-control form-control-sm"
                                        placeholder="Confirm Password" required>
                                    @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-success rounded-pill waves-effect waves-light">Update
                                        Password</button>
                                    <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light"
                                        onclick="location.reload();">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
