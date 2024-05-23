
<div class="container-fluid mt-5 pt-5">
    <div class="row justify-content-center ">
        <div class="col-10">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="./media/plesto-masthead-lime.webp" class="d-block mx-lg-auto img-fluid heroImg" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">LimeWave</h1>
                    <p class="lead">{{__("messages.hero")}}
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        @guest
                        <a href="{{ route('register') }}" class="btn btn-accent btn-hero btn-lg fw-bold pt-3">{{__("messages.register")}}</a>
                        <a href="{{ route('login') }}" class="btn btn-s btn-lg fw-bold pt-3 px-4">{{__("messages.login")}}</a>
                        @endguest
                        
                        @auth
                        <button type="button" class="btn btn-accent btn-hero"><a href="{{ route('article.create') }}" class="btn btn btn-accent btn-lg px-4 fw-bold">{{__("messages.uploadAnAd")}}</a></button>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
