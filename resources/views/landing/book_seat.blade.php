<div class="modal fade" id="bookSeatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg py-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Book Your Seat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"></rect>
							</g>
						</svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                    <form class="form-horizontal" id="bookSeatForm" method="post">
                        @csrf
                        <div class="col-md-12 ajax-message"></div>
                        <div class="form-group">
                            <label class="control-label px-3 custom-label mb-2 required" for="name">Name:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control custom-input" id="name" placeholder="Enter Name"
                                       name="name" required="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="event_id" value="" id="eventId">
                        <div class="form-group">
                            <label class="control-label px-3 custom-label mb-2  required" for="pwd">Email:</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control custom-input" name="email"
                                       placeholder="Enter Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label px-3 custom-label mb-2" for="pwd">Notes:</label>
                            <div class="col-sm-12">
                                <textarea class="form-control custom-input" name="notes"
                                          placeholder="Enter Notes"></textarea>
                            </div>
                        </div>
            <div class="modal-footer pb-0 border-0">
                <button type="button" class="btn btn-secondary custom-secondary" data-dismiss="modal">Discard</button>
                <button class="btn btn-primary custom-btn" type="submit">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
