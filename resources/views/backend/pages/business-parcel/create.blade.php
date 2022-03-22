@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-12">
                        <h4 class="header-title mb-4">Add New Parcel (Business)</h4>
                        <div class="add_new_parcel_item"> 
                            <form action="{{ route('business.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="totalcosts" id="totalcostvalue">
                                <input type="hidden" name="toarea" id="toareavalue">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>From</label>
                                        <select name="fromarea" id="palton">
                                            <option label="--Choose Area--"></option>
                                            <option value="Paltan">Paltan</option>
                                        </select>
                                        @error('fromarea')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>To</label>
                                        <select  id="area">
                                            <option label="--Choose Area--"></option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->cost }}">{{ $area->relationWithCoverageArea->area_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('toarea')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Weight</label>
                                        <input type="text" name="weight" id="weight" placeholder="Kg"> 
                                        @error('weight')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>What is your product likes</label>
                                        <div class="parcel_product__likes_inner">
                                            <div class="parcel_product_likes">
                                                <input value="Fragile" type="radio" id="fragile" name="PorductitemName" required > Fragile
                                            </div>
                                            <div class="parcel_product_likes">
                                                <input value="Liquid" type="radio" id="liquid" name="PorductitemName" required > Liquid
                                            </div>
                                            <div class="parcel_product_likes">
                                                <input value="Solid" type="radio" id="solid" name="PorductitemName" required > Solid
                                            </div>
                                            @error('PorductitemName')
                                                <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="recipientName" id="recipientName" placeholder="Recipient Name"> 
                                        @error('recipientName')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" name="recipientPhone" id="recipientPhone" placeholder="Recipient Phone Number">
                                        @error('recipientPhone')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address <span style="color:#D3D3D3">(Maximum 500 Charecter)</span></label>
                                        <textarea name="recipientAdd" id="recipientAdd" rows="9" placeholder="Recipient Address"></textarea> 
                                        @error('recipientAdd')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                    <div class="col-md-6">
                                        <label>Note <span style="color:#D3D3D3">(Maximum 500 Charecter)</span></label>
                                        <textarea name="recipientnote" id="recipientnote"  rows="9" placeholder="Type Your Note"></textarea>
                                        @error('recipientnote')
                                            <span style="color:red; margin-top:10px; font-weight:700; display:block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                    <div class="add_new_parcel_button text-center m-auto mt-3">
                                        <button id="submitBtn" type="submit">SEDN PARCEL</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-12 col-12">
                        <h4 class="header-title mb-4">Delivery</h4>
                        <div class="add_new_order_cart">
                            <div class="add_new_cart_summery">
                                <div class="pa_item1">
                                    <div class="pa_1">
                                        <p>Delivery Charge</p>
                                    </div>
                                    <div class="pa_2">
                                        TK<span id="areacharge">.00</span>
                                    </div>
                                </div>
                                <div class="pa_item2">
                                    <div class="pa_1">
                                        <p>Product Charge</p>
                                    </div>
                                    <div class="pa_2">
                                        TK<span id="itemcharge">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="add_new_cart_total">
                               <div class="pa_item3">
                                <div class="pa_1">
                                    <p>Total Amount</p>
                                </div>
                                <div class="pa_2">
                                    TK<span id="totalcost">.00</span>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin_footer_script')
    <script type="text/javascript">
        $("#liquid").click(function(){
            var x = $("#recipientPhone").val();
            var area = $("#area").val();
            var weight = $("#weight").val();
            var cost = area * weight + 10
            $("#itemcharge").text('10')
            $("#areacharge").text(area*weight);
            $("#totalcost").text(cost)
            $("#totalcostvalue").val(cost)
            let toarea = $("#area").find(":selected").text()
            $("#toareavalue").val(toarea)
        })

        $("#fragile").click(function(){
            var x = $("#recipientPhone").val();
            var area = $("#area").val();
            var weight = $("#weight").val();
            var cost = area * weight + 5
            $("#itemcharge").text('5')
            $("#areacharge").text(area*weight);
            $("#totalcost").text(cost)
            $("#totalcostvalue").val(cost)
            let toarea = $("#area").find(":selected").text()
            $("#toareavalue").val(toarea)
        })

        $("#solid").click(function(){
            var x = $("#recipientPhone").val();
            var area = $("#area").val();
            var weight = $("#weight").val();
            var cost = area * weight + 5
            $("#itemcharge").text('5')
            $("#areacharge").text(area*weight);
            $("#totalcost").text(cost)
            $("#totalcostvalue").val(cost)
            let toarea = $("#area").find(":selected").text()
            $("#toareavalue").val(toarea)
        })
        $('#area').change(function() {
            $("#weight").val("");
            $("#itemcharge").text('.00')
            $("#areacharge").text('.00')
            $("#totalcost").text(".00")
            $("#totalcostvalue").val(".00")
            $("#solid").prop("checked", false);
            $("#liquid").prop("checked", false);
            $("#fragile").prop("checked", false);
        });
        $("#weight").keyup(function(e){
            $("#solid").prop("checked", false);
            $("#liquid").prop("checked", false);
            $("#fragile").prop("checked", false);
        })
    </script>
@endsection
