    <!-- CALCULATE AREA STARTS -->
    <section class="calculate-cost-area" id="calculation">
        <div class="cal-img-l">
          <img src="{{ asset('frontend') }}/assets/images/calculate/calculate-cost.png" alt="">
        </div>
      <div class="container">
        <div class="row ">
          <div class="offset-lg-6 col-lg-6">
            <div class="section-title pr-150">
              <h3>{{ __('Calculate Your Cost') }}</h3>
              <p>We are offering you low-cost courier services in Dhaka. From here you can calculate your delivery cost effortlessly.</p>
            </div>
                <div class="calculate-form">
                    <div class="row align-items-center ">
                        <div class="col-sm-3">
                            <div class="cal-items-left">
                            <label for="#c-from" class="form-label">From:</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="cal-items-righ">
                                <select class="calculate-c-from"  id="c-from" name="fromarea">
                                <option value>--Choose From--</option>
                                <option value="Paltan">Paltan</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="cal-items-left">
                            <label for="#c-destination" class="form-label">Destination:</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="cal-items-righ">
                                <select class="calculate-c-from" id="c-destination" name="destination">
                                <option value>--Choose Destination--</option>
                                @foreach ($calareas as $calarea)
                                    <option value="{{ $calarea->cost }}">{{ $calarea->relationWithCoverageArea->area_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="cal-items-left">
                            <label for="#c-service" class="form-label">Service:</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="cal-items-righ">
                                <select class="calculate-c-from" id="c-service" name="serviceItem">
                                    <option value>--Choose Service--</option>
                                    <option value="10">Fragile</option>
                                    <option value="10">Liquid</option>
                                    <option value="10">Solid</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="cal-items-left">
                                <label for="#c-weight" class="form-label">Weight (CM):</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="cal-items-righ">
                                <input type="text" name="weight" id="c-weight" placeholder="Kg">
                            </div>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col-sm-3">
                            <div class="cal-items-left lst-cal-item">
                                <label for="#c-location" class="form-label">Total Cast :</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="cal-items-righ">
                                <input type="text" name="totalCost" class="totalCost" id="c-weight" placeholder="00 BDT">
                            </div>
                            <button type="submit" class="btn calculate">Calculate Cost</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CALCULATE AREA ENDS -->


