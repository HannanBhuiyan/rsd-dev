<ul>
@forelse($areas as $areaList )
    <li>
        <div class="coverage_area_list_inner">
            <div class="coverage_area_list_item">
                <div class="coverage_area_list_right">
                    <p>{{ $areaList->area_name }}</p>
                </div>
                <div class="coverage_area_list_left">
                    <p>{{ $areaList->area_code }}</p>
                </div>
            </div>
        </div>
    </li>
    @empty
        <h5 style="color:#ED1C24">Area not found</h5>
    @endforelse
</ul>


    