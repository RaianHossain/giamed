@extends('layouts.clientLayout')
@section('title', 'Make Appointment')
@section('meta-description', 'Make an appointment with us for your care needs.')
@section('content')
@include('client.partials.inner-hero', ['title' => 'Make Appointment', 'subtitle' => 'We are here for your care', 'breadCrumb' => 'Make Appointment'])

<section class="appointment-area appointment-area-3 pos-rel pt-115 pb-120" style="background: #f7f7f7;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="calculate-box white-bg">
                    <div class="calculate-content">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="about-title news-letter-title mb-70 text-center">
                                    <h5 class="pink-color">Appointment</h5>
                                    <h1>Book Call Request</h1>
                                </div>
                            </div>
                        </div>

                        {{-- Success Alert --}}
                        <div id="success-message" class="alert alert-success text-center" style="display: none;">
                            Appointment created successfully!
                        </div>

                        <form id="appointmentForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="calculate-form appointment-form-3 mb-20">
                                        <input type="text" name="name" placeholder="Your Name" required>
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="calculate-form appointment-form-3 mb-20">
                                        <input type="text" name="phone" placeholder="Your Phone number" required>
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="calculate-form appointment-form-3 mb-20">
                                        <input type="date" name="date" placeholder="Select date" required>
                                        <i class="far fa-calendar"></i>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="calculate-form appointment-form-3 mb-20">
                                        <input type="time" name="time" placeholder="Add time" required>
                                        <i class="far fa-clock"></i>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="calculate-form appointment-form-3 mb-20">
                                        <textarea name="special_request" cols="30" rows="5" placeholder="Special request (optional)"></textarea>
                                        <i class="far fa-edit"></i>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn mt-40">Submit Query</button>
                                </div>
                            </div>
                        </form>

                        {{-- JavaScript --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const form = document.getElementById('appointmentForm');
                                const alertBox = document.getElementById('success-message');

                                form.addEventListener('submit', function (e) {
                                    alert("pressed");
                                    e.preventDefault();

                                    const formData = new FormData(form);

                                    fetch("{{ route('dashboard-appointments-store-api') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Accept': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alertBox.style.display = 'block';
                                            form.reset();
                                            setTimeout(() => {
                                                alertBox.style.display = 'none';
                                            }, 4000);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('There was an error submitting the form. Please try again.');
                                    });
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
