@foreach ($members as $member)
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item">
            <h5>{{ $member->name }}</h5>
            <p class="mb-4">{{ $member->position }}</p>
            <img class="img-fluid rounded-circle w-100 mb-4" src="{{ "images/$member->image" }}"
                alt="">
            <div class="d-flex justify-content-center">
                <a class="btn btn-square text-primary bg-white m-1" href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square text-primary bg-white m-1" href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square text-primary bg-white m-1" href="{{ $member->linkedin }}"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
@endforeach
