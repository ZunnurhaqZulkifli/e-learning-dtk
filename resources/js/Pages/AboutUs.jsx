export default function AboutUs() {
return (
<>
    <div className="p-2">
        <section class="py-md-5 py-xl-8 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8">
                        <h3 class="fs-5 text-secondary text-uppercase mb-2">About</h3>
                        <h2 class="display-5 mb-4">At our core, we prioritize pushing boundaries, embracing the unknown, and fostering a culture of continuous learning.</h2>
                        <button class="btn btn-lg btn-primary mb-md-4 mb-xl-5 mb-3"
                                type="button">Connect Now</button>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row gy-3 gy-md-4 gy-lg-0">
                    <div class="col-12 col-lg-6">
                        <div class="card bg-light m-0 p-3">
                            <div class="row gy-3 gy-md-0 align-items-md-center">
                                <div class="col-md-5">
                                    <img alt="Why Choose Us?"
                                         class="img-fluid rounded-start"
                                         src="https://via.placeholder.com/200x300" />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-0">
                                        <h2 class="card-title h4 mb-3">Why Choose Us?</h2>
                                        <p class="card-text lead">With years of experience and deep industry knowledge, we have a proven track record of success and are pushing ourselves to stay ahead of the curve.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card bg-light m-0 p-3">
                            <div class="row gy-3 gy-md-0 align-items-md-center">
                                <div class="col-md-5">
                                    <img alt="Visionary Team"
                                         class="img-fluid rounded-start"
                                         src="https://via.placeholder.com/200x300" />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-0">
                                        <h2 class="card-title h4 mb-3">Visionary Team</h2>
                                        <p class="card-text lead">With a team of visionary engineers, developers, and creative minds, we embark on a journey to transform complex challenges into ingenious technological solutions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</>
);
}
