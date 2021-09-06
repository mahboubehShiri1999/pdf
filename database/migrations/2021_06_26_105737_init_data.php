<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Interpreter;

class InitData extends Migration
{

    public function up()
    {
        Interpreter::store([
            'identifier' => 'notebook_1',
            'description' => 'this is the notebook_1 html',
            'html' => '<html><head><style>body{direction:rtl;font-family:mitra}.header{text-align:center}.table1{border-collapse:collapse;display:inline-block}.tabled1{border:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:10%}.tabled2{border:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:140px}.info td{width:150px}</style></head><body><div><h3 class="header"><b>شرکت ملی پست جمهوری اسلامی ایران</b></h3><h4 class="header"><b>اداره کل جغرافیایی و اطلاعات مکانی کشور</b></h4><p class="header">فهرست مکان های مسکونی و کسب</P></div><center style="margin:0 auto;display: block;width: 50%;"><table class="table1"><tr><td class="tabled1">شماره گشت نامه رسانی</td><td class="tabled1">{{ $tour_no }}</td><td class="tabled1" style="border:none"></td><td class="tabled1">کد جزء</td><td class="tabled1">{{ $code_joze }}</td></tr></table></center><table class="info"><tr><td>استان:</td><td colspan="2" style="text-align: right;">{{ $province }}-{{ $region }}</td><td>شهرستان:</td><td>{{ $county }}</td><td> بخش:</td><td> {{ $district }}</td></tr><tr ><td></td><td></td><td></td><td></td><td>محدوه پستی:</td><td>{{ $postal_region }}</td></tr></table><table style="float:right"><tr><td>تعداد بلوک</td><td class="tabled2">{{ $blocks_count }}</td></tr><tr><td>تعداد ساختمان</td><td class="tabled2">{{ $buildings }}</td></tr><tr><td>تعداد کد شناسایی</td><td class="tabled2">{{ $recog_count }}</td></tr><tr><td>تعداد رکورد</td><td class="tabled2">{{ $records_counts }}</td></tr></table><table style="margin-right: 60%"><tr><td>تاریخ چاپ گزارش:</td><td>{{ $date }}</td></tr><tr></tr><tr><td>تعداد صفحات گزارش:</td><td>{nb}</td></tr></table></body></html>',

        ]);
        Interpreter::store([
            'identifier' => 'notebook_2',
            'description' => 'this is the notebook_2 html',
            'html' => '<html><head><style>body{direction:rtl;font-family:mitra}.div1{border:1px solid black;padding:6px 6px 15px 6px;width:100%}.tab{border-collapse:collapse}.table3 td{border:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:80px;line-height:30px}.table4 td{border-bottom:1px solid black;border-left:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:72px;line-height:20px}.table5 td{border-bottom:1px solid black;border-right:1px solid black;border-top:1px solid black;padding-left:10px;padding-right:10px;text-align:right;width:10px;line-height:15px}.table6 td{padding-left:10px;padding-right:10px;text-align:center;line-height:20px;font-size:10px}</style></head><body><div class="div1"><table class="table3 tab"><tr><td style="width:120px"> کد گشت نامه رسانی:</td><td>{{ $tour_no ?? ""}}</td><td>کد جزء:</td><td>{{ $code_joze ?? ""}}</td><td style="border: none;width:10px"></td><td style="width:370px;font-size:15px">شرکت ملی پست جمهوری اسلامی ایران-اداره کل جغرافیایی و اطلاعات مکانی کشور</td><td style="border: none;width:10px"></td><td>تاریخ:</td><td style="width:100px">{{ $date ?? ""}}</td><td>صفحه:</td><td>{PAGENO}</td></tr></table></div><table class="table4 tab"><tr><td style="border-right: 1px solid black">ردیف در رکورد</td><td>نوع پلاک</td><td>تکمیلی</td><td>پلاک</td><td>طبقه</td><td>سمت</td><td style="border:none;border-bottom:1px solid black;width: 150px">نام خانوادگی/نوع فعالیت</td><td style="border:none;border-bottom:1px solid black"></td><td style="width: 150px">نام/نام کارگاه</td><td>کدفعالیت</td><td>نوع مکان</td><td>کد شناسایی</td></tr></table> @for($i = 0; $i <count ($data["parts"] ?? []); $i++) @for($j = 0; $j < count($data["parts"][$i]["blocks"] ?? []); $j++) @for($k = 0; $k < count($data["parts"][$i]["blocks"][$j]["buildings"] ?? []); $k++) @for($l = 0; $l < count($data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"] ?? []); $l++)<table class="table5 tab" style="width:100%"><tr><td style="border-right: 1px solid black">بلوک</td><td style="border-right:none">{{ $data["parts"][$i]["blocks"][$j]["id"] ?? ""}}</td><td>ساختمان</td><td style="border-right:none">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["building_no"] ?? ""}}</td><td>{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["floor_count"] ?? ""}}</td><td style="border-right:none">طبقه</td><td>آدرس</td><td>محله</td><td style="width: 150px;border-right:none">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["neighbourhood"]["name"] ?? ""}}</td><td dir="ltr" style="width: 150px;border-right:none">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["secondary_street"]["name"] ?? ""}}</td><td dir="ltr"  style="width: 150px;border-right:none">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["street"]["name"] ?? ""}}</td><td style="width: 40px"></td><td style="border-left: 1px solid black;width: 40px"></td></tr></table> @for($m = 0; $m < count($data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"] ?? []); $m++) @for($n = 0; $n < count($data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"] ?? []); $n++)<table class="table6 tab"><tr><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["row_no"] ?? ""}}</td><td style="width:52px;">نوع پلاک</td><td style="width:52px;">تکمیلی</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["plate_no"] ??""}}</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["floor_no"] ?? ""}}</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["unit_no"] ?? ""}}</td><td style="width:135px;"> {{$data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["last_name"] ?? $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["action_name"] ?? ""}}</td><td style="width:135px;"> {{$data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["first_name"] ?? $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["workshop_name"] ?? ""}}</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["isic_id"] ?? ""}}</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["location_type_id"] ?? ""}}</td><td style="width:52px;">{{ $data["parts"][$i]["blocks"][$j]["buildings"][$k]["addresses"][$l]["entrances"][$m]["units"][$n]["recog_code"] ?? ""}}</td></tr></table> @endfor @endfor @endfor @endfor @endfor @endfor</body></html>',
        ]);
        Interpreter::store([
            'identifier' => 'notebook_3',
            'description' => 'this is the notebook_3 html',
            'html' => '<html><head><style>body{direction:rtl;font-family:mitra}.div2{padding:6px 6px 15px 6px;width:100%}.table7 td{border:1px solid black;padding-left:10px;padding-right:10px;text-align:right;width:80px;line-height:15px}.table8 td{border:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:80px;line-height:15px}.ta{border-collapse:collapse;width:100%}.table9 td{border:1px solid black;padding-left:10px;padding-right:10px;text-align:center;width:80px;line-height:15px}</style></head><body><div class="div2"><table class="table7 ta"><tr><td style="width: 110px;"> کد گشت نامه رسانی:</td><td>{{ $tour_no }}</td><td colspan="3" rowspan="2" style="border:none;font-size: 20px;font-weight: bold;text-align: center;">شرکت ملی پست جمهوری اسلامی ایران</td><td>تاریخ:</td><td>{{ $date }}</td></tr><tr><td>کد جزء:</td><td>{{ $code_joze }}</td><td>صفحه:</td><td>{PAGENO}</td></tr></table></div><table class="table8 ta"><tr><td colspan="2">معبر</td></tr><tr><td>نوع معبر</td><td>نام معبر</td></tr> @foreach($ways as $way)<tr><td>{{$way["type"]}}</td><td dir="ltr" >{{$way["name"]}}</td></tr> @endforeach</table><table class="table9 ta"><tr><td colspan="2">محله</td></tr> @foreach($neighbourhoods as $n)<tr><td colspan="2">{{$n}}</td></tr> @endforeach</table></body></html>',
        ]);
        Interpreter::store([
            'identifier' => 'gavahi_1',
            'description' => 'this is the gavahi_1 html',
            'html' => '<html><head><style>body{direction:rtl;font-family:mitra}.border{border:1px solid black}.table td{text-align:center}.table2 td{text-align:center;width:30px}.barcode{padding:1.5mm;margin:5px;margin-bottom:4px;vertical-align:top;color:black}.barcodecell{vertical-align:middle}</style></head> {{--@php--}} {{--import --}} {{--@endphp--}}<body> {{--{{ var_dump($data) }}--}}@foreach($data as $key=>$item)<table><tr><td style="margin-left:90px;width:200px; height:100px"><img src="var:logo" width="150px" height="100px"></td><td style="width:350px;font-weight: bold;text-align:center;vertical-align: top;font-size:19px;"><span style="margin-right:40px">گواهی کد پستی ده رقمی</span></td></td><td style="width:250px;text-align: center"><div class="barcodecell"> <barcode code={{$item["barcode"]}} type="C128C" class="barcode" size="1" height="1"/></div><div><span style="margin-right:10em;font-size: 18px"> (اصالت گواهی با استعلام این بارکد تعیین می شود) </span></div></td></tr></table><table class="table2" style="border-collapse: collapse"><tr><td><br></td></tr><tr><td><br></td></tr><tr><td style="width:100px;text-align: right;margin-left:0"><span style="width:100px;text-align: right;margin-left:0">کد پستی ده رقمی:</span></td> @for($i=count($item["postalcode"]) - 1;$i>=0;$i--)<td class="border">{{$item["postalcode"][$i]}}</td> @endfor<td></td><td style="width:100px;">تاریخ صدور :</td><td style="width:100px;">{{$date}}</td></tr></table><table><tr><td><br></td></tr><tr><td>استان:</td><td style="width:120px">{{$item["statename"]}}</td><td>شهرستان:</td><td style="width:120px">{{$item["townname"]}}</td><td>بخش:</td><td style="width:160px">{{$item["zonename"]}}</td><td>دهستان:</td><td style="width:160px">{{$item["villagename"]}}</td></tr><tr><td style="width:120px">شهر/روستا/آبادی :</td><td style="width:120px">{{$item["locationname"]}}</td></tr></table><table><tr><td><br></td></tr><tr><td><br></td></tr><tr><td style="width:120px">نشانی پستی :</td></tr><tr><td>محله:</td><td style="width:230px">{{$item["parish"]}}</td><td style="width:180px">معبر ماقبل آخر:</td><td style="width:120px">{{$item["preaven"]}}</td><td>معبرآخر:</td><td style="width:230px">{{$item["avenue"]}}</td></tr><tr><td>پلاک:</td><td style="width:230px">{{$item["plate_no"]}}</td><td style="width:180px">ورودی/ بلوک:</td><td style="width:120px">{{$item["blockno"]}}</td><td>طبقه:</td><td style="width:230px">{{$item["floorno"]}}</td><td>واحد:</td><td style="width:120px">{{$item["unit"]}}</td></tr><tr><td>نوع کاربری :</td><td style="width:120px">{{$item["building_type"]}}</td></tr><tr><td><br></td></tr><tr><td><br></td></tr></table><table><tr><td style="width:100px">نشانی استاندارد ملی:</td></tr><tr><td style="width:100%">{{$item["address"]}}</td></tr><tr><td></td></tr></table> @if($item["image_exists"])<table><tr><td></td></tr><tr><td height="50px"></td></tr><tr><td style="width:100px">تصویر کروکی ملک:</td></tr><tr><td></td></tr><tr><td></td></tr><tr><td><img src="var:{{$item["postalcode"]}}" width="700px" height="400px"></td></tr></table> @endif<div style="position:absolute;bottom:0;left:0;right:0"><table><tr><td style="width:70%;border-top:4px solid black"> قابل توجه درخواست کننده گرامی:<br>۱.کدپستی مندرج در گواهی منحصرا متعلق به نشانی ذکر شده بوده و استفاده از این کد پستی برای سایر مکانها موجب اشتباه در پردازش اطلاعات و عدم خدمت رسانی صحیح به شما خواهد بود<br>۲.مدت اعتبار این گواهی از تاریخ صدور {{$ttl}} روز می باشد.<br>۳.با مراجعه به سامانه GNAF.POST.IR می توانید کد پستی خود را دریافت کنید.<br>۴.هزینه صدور گواهی فوق 000000 ریال می باشد.<br>۵.اصالت این گواهی از طریق استعلام بر خط بارکد تعیین می گردد.<br>۶.در صورت مشاهده هر گونه مغایرت در اطلاعات این گواهی با نشانی خود, به نزدیکترین دفتر پستی مراجعه نمایید.</td><td style="width:30%;border-top:4px solid black;border-right:4px solid black;text-align: center"> <barcode code=$QRCode type="QR" class="barcode" size="1.5" error="M" height="2" disableborder="1"/></td></tr></table></div>@if($x !== $length) <pagebreak/> @endif @php $x++; @endphp@endforeach</body></html>'
        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("interpreters");
    }


}
