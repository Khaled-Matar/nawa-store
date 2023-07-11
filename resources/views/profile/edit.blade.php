@if ($errors->any())
    <div class="alert alert-danger">
        You have some errors
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<x-shop-layout title="Update Profile">
    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="contact-form-head">
                            <div class="form-main">
                                <form class="form" method="post" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="first_name" type="text"
                                                    {{-- value="{{ old('first_name', $user->profile->first_name) }}" --}}
                                                    placeholder="First Name" required="required">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="last_name" type="text"
                                                {{-- value="{{ old('last_name', $user->profile->last_name) }}" --}}
                                                    placeholder="Last Name" required="required">
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="subject" type="text"
                                                value="{{ old('email', $user->email) }}"
                                                    placeholder="Email" required="required">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="birthday" type="date" {{-- value="{{ old('birthday', $user->profile->birthday) }}" --}}
                                                    placeholder="Birthday" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="street" type="text" {{-- value="{{ old('street', $user->profile->street) }}" --}}
                                                    placeholder="Street" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="city" type="text" {{-- value="{{ old('city', $user->profile->city) }}" --}}
                                                    placeholder="City" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="province" type="text" {{-- value="{{ old('province', $user->profile->province) }}" --}}
                                                    placeholder="Province" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <input name="postal_code" type="number" {{-- value="{{ old('postal_code', $user->profile->postal_code) }}" --}}
                                                    placeholder="Postal Code">
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Country Code</label>
                                                <div class="select-items">
                                                    <select name="country_code" class="form-control">
                                                        <option value="0">select</option>
                                                        @foreach ($countries as $code => $name)
                                                            <option @selected($code == old('country_code'))
                                                                value="{{ $code }}">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn ">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
</x-shop-layout>
