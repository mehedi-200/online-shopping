<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume of Md Ali Reza</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px;">
<table style="width: 100%; border-spacing: 0;">
    <tr>

        <td style="width:40%; ">
                @php
                    $path = storage_path('app/public/reza-vai.png');
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                @endphp
            <div class="image-box" style="width: 100%; height: 210px; overflow: hidden;position:relative;">
                <img src="{{ $base64 }}" alt="" style="width: 100%; max-height: 100%;position:absolute;top:50%;transform:translateY(-50%);object-fit: cover;">
            </div>

            {{--            {{ url('public/image/img.png') }}--}}
            <br/>
            <div style="width:100%;margin-bottom:20px;">
                <div style="font-size:18px;text-transform:uppercase;margin-bottom: 8px;">Professional Skills</div>
                <ul style="list-style:none;padding:0;margin:0;margin-bottom:10px;font-size:14px;">
                    <li style="line-height: 23px;">-Laravel</li>
                    <li style="line-height: 23px;">-VueJs</li>
                    <li style="line-height: 23px;">-ReactJs (Basic)</li>
                    <li style="line-height: 23px;">-MySQL Database</li>
                    <li style="line-height: 23px;">-Postman</li>
                    <li style="line-height: 23px;">-PHPStorm</li>
                </ul>
            </div>
            <div  style="border-bottom:3px solid #dddddd;width:100%;">
                <div style="text-transform: uppercase;font-size:18px;margin-bottom:10px;">marketplace product</div>
                <p  style="font-weight:bold;font-size:18px;line-height:10px;margin-bottom: -12px;">-Inventory & sale system</p>
                <p><a class="text-decoration-none text-black" style="color:black;text-decoration: none;line-height:20px;" href="https://codecanyon.net/item/mb-pos/25624678">https://codecanyon.net/item/mb- pos/25624678</a></p>
                <p class="text-bold market-place-section-title" style="line-height:10px;font-weight:bold;font-size:18px;margin-bottom: -12px;">-Ongoing project demo</p>
                <p><a class="text-decoration-none text-black" style="text-decoration: none;color:black;line-height:20px;" href="https://devintime.com/dev/course/">(https://devintime.com/dev/course/)</a></p>
            </div>
            <br/>
            <div class="" style="width:100%;border-bottom:3px solid #dddddd;margin:0;padding:0;">
                <div class="text-upc title-size" style="font-size:18px;text-transform: uppercase;margin-bottom:-10px;">keep in touch:</div>
                <ul style="list-style:none;padding:0;font-size:14px;">
                    <li style="line-height: 23px;">Cell: +88 019 1304 1366</li>
                    <li style="line-height: 23px;">alireza2896@gmail.com</li>
                    <li style="line-height: 23px;"> Skype : reza2896</li>
                    <li style="line-height: 23px;">Dhanmondi, Dhaka,Bangladesh</li>
                </ul>
            </div>
            <br/>
            <div  style="width:100%;margin:0;padding:0;">
                <div class="text-upc title-size" style="text-transform: uppercase;font-size: 18px;margin-bottom:10px;">character reference</div>
                <ul style="list-style:none;padding:0;margin:0;font-size:14px;">
                    <li class="text-black text-bold" style="font-weight: bold;color:black;">Md Sadiq Iqbal</li>
                    <li style="line-height: 23px;">Asst. Professor and HOD</li>
                    <li style="line-height: 23px;">Department of CSE</li>
                    <li style="line-height: 23px;">Bangladesh University</li>
                    <li style="line-height: 23px;">Mobile: +88 017 5555 9312</li>
                    <li style="line-height: 23px;">E-mail: sadiqiqbal2006@gmail.com</li>
                </ul>

            </div>
        </td>

        {{--        right side here--}}

        <td style="width:60%;">
            <div style=";padding-left:8px;">
                <br>
                <br>
                <div  style="width:100%;overflow: hidden;padding:0;border-bottom:3px solid #dddddd;">
                    <div  style="font-size: 42px; font-style: italic;margin-bottom:-15px;">
                        MD Ali Reza
                    </div>
                    <p style="font-weight: bold;font-size:15px;">SR. WEB DEVELOPER</p>
                    <br>
                    <div class="goals-title title-size" style="font-size: 18px; text-transform: uppercase; color: #313030;margin-bottom:-10px;">Career Goals</div>
                    <p style="font-size:14px;">I am a senior developer with proven experience in web application development using Laravel and VueJs. I am currently seeking new avenues to grow professionally.</p>
                </div>

                <br>

                <div style="margin:0;padding-bottom:10px;">
                    <div  style="font-size:18px;text-transform: uppercase;margin-bottom:-5px;">position held</div>
                    <br>
                    <div  style="font-size:14px;font-weight:bold;text-transform:uppercase;margin-bottom:-15px;">
                        sr. web developer, team leeds
                    </div>
                    <p  style="color: #949494;line-height: 20px">Olivine Ltd, Bangladesh | June. 2020 to present</p>
                    <p  style="margin-top: -8px;line-height: 20px;font-size:14px;">- Lead a web development team to execute quality products.<br>
                        - Significant contributions to develop "Land Information Bank" system. Which was
                        inaugurated by the hon'ble prime minister of Bangladesh on 8th Sep 2021.
                    </p>

                    <div style="font-size:14px;font-weight:bold;text-transform:uppercase;margin-bottom:-15px">
                        web developer
                    </div>
                    <p  style="color: #949494;line-height: 20px;">Techcoderz Ltd. | December 2017 to May. 2020</p>
                    <p  style="margin-top: -8px;line-height: 20px;font-size:14px;">- Provided support to ensure successfully develop 15 projects.<br>
                        - Develop car rental, E-commerce and inventory management system.
                    </p>
                    <div  style="font-size:14px;font-weight:bold;text-transform:uppercase;margin-bottom:-15px">
                        web developer
                    </div>
                    <p  style="color: #949494;line-height: 20px">Maq Group | January 2017 to November 2017</p>
                    <p style="margin-top: -8px;line-height: 20px;margin-bottom:0;font-size:14px;">- Develop applications to manage the company's online platform.<br>
                        - Develop systems for ingredient, purchase, production, sales, and stock management.
                    </p>
                </div>
                {{--            <br>--}}
                <div  style="margin:0;padding:0;">
                    <div  style="font-size: 18px;text-transform: uppercase;margin-bottom:-5px;">educational training</div>
                    <br>
                    <div  style="font-size:14px;font-weight:bold;text-transform: uppercase;margin-bottom:-15px">
                        bangladesh university
                    </div>
                    <p  style="color: #949494;line-height: 20px;">Bachelor of Computer Science and Engineering</p>
                    <p style="margin-top: -8px;line-height: 20px;font-size:14px;">- Graduated 2019.<br>
                        - Participant, MPC programming contest. <br>
                        - Participant, Inter-university programming contest.

                    </p>
                    <div class="text-bold text-upc" style="font-size:14px;font-weight:bold;text-transform: uppercase;margin-bottom:-15px;">
                        JESSOR POLYTECHNIC INSTITUTE
                    </div>
                    <p  style="color: #949494;line-height: 20px;">Diploma in Computer Science and Engineering</p>
                    <p class="p-lh" style="margin-top: -8px;line-height: 20px;font-size:14px;">
                        - Graduated 2012 <br>
                        - Member, Coderz Club JPI <br>
                        - Participant cyber security awareness program
                    </p>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>

















