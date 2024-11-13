@extends('website.template')
@section('content')
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" action="{{route('website.placeOrder')}}" method="POST">
	@csrf
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>

							@foreach ($items as $hash => $item)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{asset('uploads/products/'.$item->getExtraInfo('image'))}}" alt="IMG">
									</div>
								</td>
								<td class="column-2">{{$item->getTitle()}}</td>
								<td class="column-3">Rs. {{$item->getPrice()}}</td>
								<td class="column-4">
									<div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$item->getQuantity()}}">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
								</td>
								<td class="column-5">Rs. {{$item->getPrice() * $item->getQuantity()}}</td>
							</tr>
							@endforeach
						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Update Cart
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								Rs. {{$cart_total}}
							</span>
						</div>
					</div>

					<div class="w-full-ssm mt-3">
						<span class="stext-110 cl2">
							Fill in your information:
						</span>
					</div>

					<div class="bor12 p-t-15 p-b-30">
						<div class="p-r-18 p-r-0-sm w-full-ssm">

							<div class="p-t-15">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Full Name">
								</div>

								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Phone No.">
								</div>

								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email">
								</div>

								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select class="js-select2" name="city">
										<option>Select a City...</option>
										<option value="">Select City</option>
										<option value="Ahmadpur Sial">Ahmadpur Sial</option>
										<option value="Ahmedpur East">Ahmedpur East</option>
										<option value="Alipur Chatha">Alipur Chatha</option>
										<option value="Arifwala">Arifwala</option>
										<option value="Attock Tehsil">Attock Tehsil</option>
										<option value="Baddomalhi">Baddomalhi</option>
										<option value="Bahawalnagar">Bahawalnagar</option>
										<option value="Bahawalpur">Bahawalpur</option>
										<option value="Bakhri Ahmad Khan">Bakhri Ahmad Khan</option>
										<option value="Basirpur">Basirpur</option>
										<option value="Basti Dosa">Basti Dosa</option>
										<option value="Begowala">Begowala</option>
										<option value="Bhakkar">Bhakkar</option>
										<option value="Bhalwal">Bhalwal</option>
										<option value="Bhawana">Bhawana</option>
										<option value="Bhera">Bhera</option>
										<option value="Bhopalwala">Bhopalwala</option>
										<option value="Burewala">Burewala</option>
										<option value="Chak Azam Saffo">Chak Azam Saffo</option>
										<option value="Chak Jhumra">Chak Jhumra</option>
										<option value="Chak One Hundred Twenty Nine Left">Chak One Hundred Twenty Nine Left</option>
										<option value="Chak Thirty-one -Eleven Left">Chak Thirty-one -Eleven Left</option>
										<option value="Chak Two Hundred Forty-Nine TDA">Chak Two Hundred Forty-Nine TDA</option>
										<option value="Chakwal">Chakwal</option>
										<option value="Chawinda">Chawinda</option>
										<option value="Chichawatni">Chichawatni</option>
										<option value="Chiniot">Chiniot</option>
										<option value="Chishtian">Chishtian</option>
										<option value="Choa Saidanshah">Choa Saidanshah</option>
										<option value="Chuhar Kana">Chuhar Kana</option>
										<option value="Chunian">Chunian</option>
										<option value="Daira Din Panah">Daira Din Panah</option>
										<option value="Dajal">Dajal</option>
										<option value="Dandot RS">Dandot RS</option>
										<option value="Darya Khan">Darya Khan</option>
										<option value="Daska">Daska</option>
										<option value="Daud Khel">Daud Khel</option>
										<option value="Daultala">Daultala</option>
										<option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
										<option value="Dhanot">Dhanot</option>
										<option value="Dhaunkal">Dhaunkal</option>
										<option value="Dhok Awan">Dhok Awan</option>
										<option value="Dijkot">Dijkot</option>
										<option value="Dinan Bashnoian Wala">Dinan Bashnoian Wala</option>
										<option value="Dinga">Dinga</option>
										<option value="Dipalpur">Dipalpur</option>
										<option value="Dullewala">Dullewala</option>
										<option value="Dunga Bunga">Dunga Bunga</option>
										<option value="Dunyapur">Dunyapur</option>
										<option value="Eminabad">Eminabad</option>
										<option value="Faisalabad">Faisalabad</option>
										<option value="Faqirwali">Faqirwali</option>
										<option value="Faruka">Faruka</option>
										<option value="Fazilpur">Fazilpur</option>
										<option value="Ferozewala">Ferozewala</option>
										<option value="Fort Abbas">Fort Abbas</option>
										<option value="Garh Maharaja">Garh Maharaja</option>
										<option value="Gojra">Gojra</option>
										<option value="Gujar Khan">Gujar Khan</option>
										<option value="Gujranwala">Gujranwala</option>
										<option value="Gujranwala Division">Gujranwala Division</option>
										<option value="Gujrat">Gujrat</option>
										<option value="Hadali">Hadali</option>
										<option value="Hafizabad">Hafizabad</option>
										<option value="Harnoli">Harnoli</option>
										<option value="Harunabad">Harunabad</option>
										<option value="Hasan Abdal">Hasan Abdal</option>
										<option value="Hasilpur">Hasilpur</option>
										<option value="Haveli Lakha">Haveli Lakha</option>
										<option value="Hazro">Hazro</option>
										<option value="Hujra Shah Muqeem">Hujra Shah Muqeem</option>
										<option value="Jahanian Shah">Jahanian Shah</option>
										<option value="Jalalpur Jattan">Jalalpur Jattan</option>
										<option value="Jalalpur Pirwala">Jalalpur Pirwala</option>
										<option value="Jampur">Jampur</option>
										<option value="Jand">Jand</option>
										<option value="Jandiala Sher Khan">Jandiala Sher Khan</option>
										<option value="Jaranwala">Jaranwala</option>
										<option value="Jatoi Shimali">Jatoi Shimali</option>
										<option value="Jauharabad">Jauharabad</option>
										<option value="Jhang">Jhang</option>
										<option value="Jhang Sadar">Jhang Sadar</option>
										<option value="Jhawarian">Jhawarian</option>
										<option value="Jhelum">Jhelum</option>
										<option value="Kabirwala">Kabirwala</option>
										<option value="Kahna Nau">Kahna Nau</option>
										<option value="Kahuta">Kahuta</option>
										<option value="Kalabagh">Kalabagh</option>
										<option value="Kalaswala">Kalaswala</option>
										<option value="Kaleke Mandi">Kaleke Mandi</option>
										<option value="Kallar Kahar">Kallar Kahar</option>
										<option value="Kalur Kot">Kalur Kot</option>
										<option value="Kamalia">Kamalia</option>
										<option value="Kamar Mushani">Kamar Mushani</option>
										<option value="Kamoke">Kamoke</option>
										<option value="Kamra">Kamra</option>
										<option value="Kanganpur">Kanganpur</option>
										<option value="Karor">Karor</option>
										<option value="Kasur">Kasur</option>
										<option value="Keshupur">Keshupur</option>
										<option value="Khairpur Tamiwali">Khairpur Tamiwali</option>
										<option value="Khandowa">Khandowa</option>
										<option value="Khanewal">Khanewal</option>
										<option value="Khanga Dogran">Khanga Dogran</option>
										<option value="Khangarh">Khangarh</option>
										<option value="Khanpur">Khanpur</option>
										<option value="Kharian">Kharian</option>
										<option value="Khewra">Khewra</option>
										<option value="Khurrianwala">Khurrianwala</option>
										<option value="Khushab">Khushab</option>
										<option value="Kohror Pakka">Kohror Pakka</option>
										<option value="Kot Addu Tehsil">Kot Addu Tehsil</option>
										<option value="Kot Ghulam Muhammad">Kot Ghulam Muhammad</option>
										<option value="Kot Mumin">Kot Mumin</option>
										<option value="Kot Radha Kishan">Kot Radha Kishan</option>
										<option value="Kot Rajkour">Kot Rajkour</option>
										<option value="Kot Samaba">Kot Samaba</option>
										<option value="Kot Sultan">Kot Sultan</option>
										<option value="Kotli Loharan">Kotli Loharan</option>
										<option value="Kundian">Kundian</option>
										<option value="Kunjah">Kunjah</option>
										<option value="Ladhewala Waraich">Ladhewala Waraich</option>
										<option value="Lahore">Lahore</option>
										<option value="Lala Musa">Lala Musa</option>
										<option value="Lalian">Lalian</option>
										<option value="Layyah">Layyah</option>
										<option value="Layyah District">Layyah District</option>
										<option value="Liliani">Liliani</option>
										<option value="Lodhran">Lodhran</option>
										<option value="Mailsi">Mailsi</option>
										<option value="Malakwal">Malakwal</option>
										<option value="Malakwal City">Malakwal City</option>
										<option value="Mamu Kanjan">Mamu Kanjan</option>
										<option value="Mananwala">Mananwala</option>
										<option value="Mandi Bahauddin">Mandi Bahauddin</option>
										<option value="Mandi Bahauddin District">Mandi Bahauddin District</option>
										<option value="Mangla">Mangla</option>
										<option value="Mankera">Mankera</option>
										<option value="Mehmand Chak">Mehmand Chak</option>
										<option value="Mian Channun">Mian Channun</option>
										<option value="Mianke Mor">Mianke Mor</option>
										<option value="Mianwali">Mianwali</option>
										<option value="Minchinabad">Minchinabad</option>
										<option value="Mitha Tiwana">Mitha Tiwana</option>
										<option value="Moza Shahwala">Moza Shahwala</option>
										<option value="Multan">Multan</option>
										<option value="Multan District">Multan District</option>
										<option value="Muridke">Muridke</option>
										<option value="Murree">Murree</option>
										<option value="Mustafabad">Mustafabad</option>
										<option value="Muzaffargarh">Muzaffargarh</option>
										<option value="Nankana Sahib">Nankana Sahib</option>
										<option value="Narang Mandi">Narang Mandi</option>
										<option value="Narowal">Narowal</option>
										<option value="Naushahra Virkan">Naushahra Virkan</option>
										<option value="Nazir Town">Nazir Town</option>
										<option value="Okara">Okara</option>
										<option value="Pakki Shagwanwali">Pakki Shagwanwali</option>
										<option value="Pakpattan">Pakpattan</option>
										<option value="Pasrur">Pasrur</option>
										<option value="Pattoki">Pattoki</option>
										<option value="Phalia">Phalia</option>
										<option value="Pind Dadan Khan">Pind Dadan Khan</option>
										<option value="Pindi Bhattian">Pindi Bhattian</option>
										<option value="Pindi Gheb">Pindi Gheb</option>
										<option value="Pir Mahal">Pir Mahal</option>
										<option value="Qadirpur Ran">Qadirpur Ran</option>
										<option value="Qila Didar Singh">Qila Didar Singh</option>
										<option value="Rabwah">Rabwah</option>
										<option value="Rahim Yar Khan">Rahim Yar Khan</option>
										<option value="Rahimyar Khan District">Rahimyar Khan District</option>
										<option value="Raiwind">Raiwind</option>
										<option value="Raja Jang">Raja Jang</option>
										<option value="Rajanpur">Rajanpur</option>
										<option value="Rasulnagar">Rasulnagar</option>
										<option value="Rawalpindi">Rawalpindi</option>
										<option value="Rawalpindi District">Rawalpindi District</option>
										<option value="Renala Khurd">Renala Khurd</option>
										<option value="Rojhan">Rojhan</option>
										<option value="Sadiqabad">Sadiqabad</option>
										<option value="Sahiwal">Sahiwal</option>
										<option value="Sambrial">Sambrial</option>
										<option value="Sangla Hill">Sangla Hill</option>
										<option value="Sanjwal">Sanjwal</option>
										<option value="Sarai Alamgir">Sarai Alamgir</option>
										<option value="Sarai Sidhu">Sarai Sidhu</option>
										<option value="Sargodha">Sargodha</option>
										<option value="Shahkot Tehsil">Shahkot Tehsil</option>
										<option value="Shahpur">Shahpur</option>
										<option value="Shahr Sultan">Shahr Sultan</option>
										<option value="Shakargarh">Shakargarh</option>
										<option value="Sharqpur">Sharqpur</option>
										<option value="Sheikhupura">Sheikhupura</option>
										<option value="Shorkot">Shorkot</option>
										<option value="Shujaabad">Shujaabad</option>
										<option value="Sialkot">Sialkot</option>
										<option value="Sillanwali">Sillanwali</option>
										<option value="Sodhra">Sodhra</option>
										<option value="Sukheke Mandi">Sukheke Mandi</option>
										<option value="Surkhpur">Surkhpur</option>
										<option value="Talagang">Talagang</option>
										<option value="Talamba">Talamba</option>
										<option value="Tandlianwala">Tandlianwala</option>
										<option value="Taunsa">Taunsa</option>
										<option value="Toba Tek Singh">Toba Tek Singh</option>
										<option value="Umerkot">Umerkot</option>
										<option value="Vihari">Vihari</option>
										<option value="Wah">Wah</option>
										<option value="Warburton">Warburton</option>
										<option value="Wazirabad">Wazirabad</option>
										<option value="West Punjab">West Punjab</option>
										<option value="Yazman">Yazman</option>
										<option value="Zafarwal">Zafarwal</option>
										<option value="Zahir Pir">Zahir Pir</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>

								<div class="bor8 bg0 m-b-12">
									<textarea class="plh3 p-lr-15" name="address" placeholder="Address" rows="5"></textarea>
								</div>

								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="zip" placeholder="Postcode / Zip">
								</div>
							</div>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								Rs. {{$cart_total}}
							</span>
						</div>
					</div>

					<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
						Checkout
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection