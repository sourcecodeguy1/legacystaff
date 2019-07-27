@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">School Operations</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Organizational Clarity</a>
                <a class="dropdown-item" href="#">Logistics</a>
                <a class="dropdown-item" href="#">Safety</a>
                <a class="dropdown-item" href="#">Meetings</a>
                <a class="dropdown-item" href="#">Facilities Repair Request</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">School Culture</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Strategic Plan Goals</a>
                <a class="dropdown-item" href="#">Care & Accountability</a>
                <a class="dropdown-item" href="#">Restorative Justice</a>
                <a class="dropdown-item" href="#">Culture Snapshot</a>
                <a class="dropdown-item" href="#">PMC</a>
                <a class="dropdown-item" href="#">Student Experience</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Department</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/9th_grade">9th Grade</a>
                <a class="dropdown-item" href="#">10th Grade</a>
                <a class="dropdown-item" href="#">11th Grade</a>
                <a class="dropdown-item" href="#">12th Grade</a>
                <a class="dropdown-item" href="#">Special Ed</a>
                <a class="dropdown-item" href="#">Culture</a>
                <a class="dropdown-item" href="#">Operations</a>
                <a class="dropdown-item" href="#">Inst.Leadership</a>
                <a class="dropdown-item" href="#">Leadership</a>
                <a class="dropdown-item" href="#">Hope (Admin)</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Support Team</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">College Counselor</a>
                <a class="dropdown-item" href="#">Alumni Counselor</a>
                <a class="dropdown-item" href="#">Social Worker</a>
                <a class="dropdown-item" href="#">Parent Engagement & Student Recruitment</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Leadership</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Grade Level Leads</a>
                <a class="dropdown-item" href="#">ELD Coordinator</a>
                <a class="dropdown-item" href="#">Technology</a>
                <a class="dropdown-item" href="#">Athletic Director</a>
                <a class="dropdown-item" href="#">Advisory Lead</a>
                <a class="dropdown-item" href="#">ASB Advisor</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Professional Development</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Summer</a>
                <a class="dropdown-item" href="#">Fall</a>
                <a class="dropdown-item" href="#">Winter</a>
                <a class="dropdown-item" href="#">Spring</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Communication</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Staff</a>
                <a class="dropdown-item" href="#">Student</a>
                <a class="dropdown-item" href="#">Parents</a>
            </div>
        </li>
    </ul>
    {{------------------------------------------Layout Content-----------------------------------}}
    {{--<img src="{{ asset('staff2019/staff2019.jpg') }}" alt="" width="400" height="300">--}}

    <div class="row">
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('staff2019/staff2019.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><strong>One Family, One Vision</strong></h5>
                <p class="card-text">Legacy Team 2019-2020</p>
            </div>
        </div>
        <div class="col-lg-8">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">7/29/2019</th>
                    <td>7/30/2019</td>
                    <td>7/31/2019</td>
                    <td>8/01/2019</td>
                    <td>8/02/2019</td>
                    <td>8/03/2019</td>
                </tr>
                <tr>
                    <td>PD at Pillar 8:00am Casual Attire</td>
                    <td>11th&12th Grade Orientation 6pm-8pm Professional Attire</td>
                    <td>Network PD School Spirit Attire World Trade Center Los Angeles  350 S Figueroa Street </td>
                    <td>9th&10th Grade Orientation 6pm-8pm Professional Attire</td>
                    <td>PD at Pillar 8:00am Casual Attire</td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <div class="p-3 mb-2 bg-secondary text-white"><strong>Message Board</strong></div>
            <div class="p-3 mb-2 bg-secondary text-white">
                <p>
                    The theme for this year’s launch is “<strong>one family, one vision</strong>” to highlight that we have also chosen to be here because we are all
                    united by our vision and to celebrate that we are officially ONE complete school family with our first senior and graduating class.
                    This year our LEGACY becomes a fact, forever rooted in the city of Santa Ana.
                </p>
            </div>
        </div>
    </div>

@endsection
