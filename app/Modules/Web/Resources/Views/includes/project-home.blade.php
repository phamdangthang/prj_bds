<div class="new new-hot">
    <div class="row">
        @php
            $images = json_decode($item->images);
        @endphp
        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
            <a href="" class="c-img hv-light"><img src="{{ $images['0'] }}" alt=""></a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-8 info-new">
            <h4><a href="">{{ $item->name }}</a></h4>
            <span class="date-submitted">Ngày đăng : <span>{{ date('d/m/Y', strtotime($item->created_at)) }}</span></span>
            <span class="price">Giá: <span>{{ number_format($item->price) }} VND</span></span>
            <span class="badroom">Phòng ngủ : <span>{{ $item->number_of_bedrooms }}</span></span>
            <span class="acreage">Diện tích: <span>{{ $item->acreage }} m²</span></span>
            <span class="door-direction">Hướng cửa : <span>{{ DIRECT[$item->door_direction] }}</span></span>
            <span class="project">Dự án : <span>{{ $item->category->name }} City</span></span>
            <span class="balcony">Ban công : <span>{{ DIRECT[$item->balcony_direction] }}</span></span>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="location d-flex justify-content-around">
                <span class="court">Tòa: <span>{{ $item->building }}</span></span>
                <span class="floor">Tầng:  <span>{{ $item->floor }}</span></span>
                <span class="apartment-number">Căn hộ số: <span>{{ $item->apartment_number }}</span></span>
            </div>
        </div>
    </div>
</div>