@extends('Partials.AdminLayout')

@section('title', 'Users')
@section('css')
    <style>
        .dt-button-collection {
            left: 0 !important;
            min-width: 82px !important;
        }
    </style>
@endsection


@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
                    <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
                    <!--end::Actions-->
                </div>

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">


                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group"
                            aria-label="Button group with nested dropdown">
                        </div>

                        <div class="row">

                            <div class="col-lg-12 margin-tb">

                                <div class="pull-left">

                                    <h2>Users Management</h2>

                                </div>

                                <div class="pull-right">

                                    <a class="btn btn-success" href="{{ route('Users.create') }}"> Create New User</a>

                                </div>

                            </div>

                        </div>

                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Order ID</th>
                                    <th>Country</th>
                                    <th>Ship City</th>
                                    <th>Ship Address</th>
                                    <th>Company Agent</th>
                                    <th>Company Name</th>
                                    <th>Ship Date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>64616-103</td>
                                    <td>Brazil</td>
                                    <td>São Félix do Xingu</td>
                                    <td>698 Oriole Pass</td>
                                    <td>Hayes Boule</td>
                                    <td>Casper-Kerluke</td>
                                    <td>10/15/2017</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>54868-3377</td>
                                    <td>Vietnam</td>
                                    <td>Bình Minh</td>
                                    <td>8998 Delaware Court</td>
                                    <td>Humbert Bresnen</td>
                                    <td>Hodkiewicz and Sons</td>
                                    <td>4/24/2016</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>0998-0355</td>
                                    <td>Philippines</td>
                                    <td>Palagao Norte</td>
                                    <td>91796 Sutteridge Road</td>
                                    <td>Jareb Labro</td>
                                    <td>Kuhlman Inc</td>
                                    <td>7/11/2017</td>
                                    <td>6</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>55154-6876</td>
                                    <td>China</td>
                                    <td>Jiannan</td>
                                    <td>8 Muir Drive</td>
                                    <td>Krishnah Tosspell</td>
                                    <td>Prosacco-Kessler</td>
                                    <td>2/5/2016</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>49349-069</td>
                                    <td>United States</td>
                                    <td>Shawnee Mission</td>
                                    <td>782 Mallory Lane</td>
                                    <td>Dale Kernan</td>
                                    <td>Bernier and Sons</td>
                                    <td>7/23/2017</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>53499-0393</td>
                                    <td>Ukraine</td>
                                    <td>Kozel’shchyna</td>
                                    <td>02 Briar Crest Parkway</td>
                                    <td>Halley Bentham</td>
                                    <td>Schoen-Metz</td>
                                    <td>2/21/2016</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>43074-105</td>
                                    <td>Philippines</td>
                                    <td>De la Paz</td>
                                    <td>643 Mayer Road</td>
                                    <td>Burgess Penddreth</td>
                                    <td>DuBuque, Stanton and Stanton</td>
                                    <td>10/25/2016</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>76328-333</td>
                                    <td>Portugal</td>
                                    <td>Sobreira</td>
                                    <td>6715 Dakota Parkway</td>
                                    <td>Cob Sedwick</td>
                                    <td>Homenick-Nolan</td>
                                    <td>2/18/2016</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>21130-054</td>
                                    <td>France</td>
                                    <td>Roissy Charles-de-Gaulle</td>
                                    <td>4942 Darwin Hill</td>
                                    <td>Tabby Callaghan</td>
                                    <td>Daugherty-Considine</td>
                                    <td>3/26/2016</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>68788-9890</td>
                                    <td>Dominican Republic</td>
                                    <td>Cristóbal</td>
                                    <td>854 Dapin Terrace</td>
                                    <td>Broddy Jarry</td>
                                    <td>Walter Group</td>
                                    <td>8/10/2016</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>68428-740</td>
                                    <td>Morocco</td>
                                    <td>Tidili Mesfioua</td>
                                    <td>67 Talisman Drive</td>
                                    <td>Marjorie McGougan</td>
                                    <td>Littel and Sons</td>
                                    <td>2/8/2016</td>
                                    <td>6</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>43269-779</td>
                                    <td>Yemen</td>
                                    <td>Az Zāhir</td>
                                    <td>5583 Walton Hill</td>
                                    <td>Edsel Sprigging</td>
                                    <td>Kulas, Huels and Strosin</td>
                                    <td>11/13/2017</td>
                                    <td>6</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>0573-0174</td>
                                    <td>Armenia</td>
                                    <td>Doghs</td>
                                    <td>7024 Eagan Court</td>
                                    <td>Jess Gouldeby</td>
                                    <td>Moen Group</td>
                                    <td>9/10/2017</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>67868-117</td>
                                    <td>Indonesia</td>
                                    <td>Pakemitan</td>
                                    <td>141 Spaight Avenue</td>
                                    <td>Marys Matzl</td>
                                    <td>Emard-Gerhold</td>
                                    <td>3/5/2016</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>0641-6114</td>
                                    <td>Kazakhstan</td>
                                    <td>Shu</td>
                                    <td>601 Chinook Street</td>
                                    <td>Gabrila Franscioni</td>
                                    <td>Gusikowski LLC</td>
                                    <td>6/21/2016</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>63629-4970</td>
                                    <td>Thailand</td>
                                    <td>Chang Klang</td>
                                    <td>7109 Ilene Place</td>
                                    <td>Cozmo Booker</td>
                                    <td>Dickinson-Klein</td>
                                    <td>2/29/2016</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>59528-4456</td>
                                    <td>Canada</td>
                                    <td>Melfort</td>
                                    <td>141 Aberg Pass</td>
                                    <td>Arlie Larking</td>
                                    <td>Rosenbaum Group</td>
                                    <td>7/7/2017</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>0054-0080</td>
                                    <td>Iceland</td>
                                    <td>Sandgerði</td>
                                    <td>4 Derek Alley</td>
                                    <td>Yorker Scogings</td>
                                    <td>Gorczany LLC</td>
                                    <td>7/6/2017</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>28475-810</td>
                                    <td>Indonesia</td>
                                    <td>Keleng</td>
                                    <td>49 Swallow Court</td>
                                    <td>Dominick Muscott</td>
                                    <td>Swaniawski-Sipes</td>
                                    <td>5/15/2016</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>53645-1070</td>
                                    <td>Russia</td>
                                    <td>Tugulym</td>
                                    <td>611 Hintze Place</td>
                                    <td>Laurette Kynforth</td>
                                    <td>Torp-Satterfield</td>
                                    <td>10/18/2017</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>66869-137</td>
                                    <td>Indonesia</td>
                                    <td>Binangun</td>
                                    <td>535 Delladonna Trail</td>
                                    <td>Beryl Lycett</td>
                                    <td>Schoen Inc</td>
                                    <td>6/28/2017</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>0069-0181</td>
                                    <td>Czech Republic</td>
                                    <td>Tlumačov</td>
                                    <td>8 Hauk Street</td>
                                    <td>Carny Boggas</td>
                                    <td>Kuphal LLC</td>
                                    <td>6/24/2016</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>50580-449</td>
                                    <td>United States</td>
                                    <td>Saint Augustine</td>
                                    <td>9050 High Crossing Pass</td>
                                    <td>Dyana Axelby</td>
                                    <td>Runolfsdottir-Hayes</td>
                                    <td>3/16/2017</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>55714-2247</td>
                                    <td>Netherlands</td>
                                    <td>Nijmegen</td>
                                    <td>2 Laurel Avenue</td>
                                    <td>Orelle Duffy</td>
                                    <td>Roberts and Sons</td>
                                    <td>4/5/2016</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>48951-1208</td>
                                    <td>Russia</td>
                                    <td>Ryazhsk</td>
                                    <td>131 Lerdahl Park</td>
                                    <td>Taylor Kinder</td>
                                    <td>Terry-Howell</td>
                                    <td>4/19/2017</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>30142-179</td>
                                    <td>Russia</td>
                                    <td>Kazan</td>
                                    <td>7 Erie Pass</td>
                                    <td>Emanuele Aylesbury</td>
                                    <td>Torp LLC</td>
                                    <td>7/6/2017</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td>49349-025</td>
                                    <td>Thailand</td>
                                    <td>Bang Racham</td>
                                    <td>98943 Schiller Pass</td>
                                    <td>Dorie Gibke</td>
                                    <td>Tremblay and Sons</td>
                                    <td>7/17/2017</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>55154-4989</td>
                                    <td>Russia</td>
                                    <td>Solnechnyy</td>
                                    <td>485 Mockingbird Road</td>
                                    <td>Melisandra Harragin</td>
                                    <td>Turner-Cartwright</td>
                                    <td>12/3/2016</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>29</td>
                                    <td>13537-426</td>
                                    <td>Lebanon</td>
                                    <td>Marjayoûn</td>
                                    <td>9141 Cascade Street</td>
                                    <td>Berenice Lampett</td>
                                    <td>Johnston-Fritsch</td>
                                    <td>12/27/2017</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>30</td>
                                    <td>52565-009</td>
                                    <td>Jamaica</td>
                                    <td>Manchioneal</td>
                                    <td>88503 Shopko Center</td>
                                    <td>Tammie McMurthy</td>
                                    <td>Sipes, Conn and Stiedemann</td>
                                    <td>10/11/2017</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>31</td>
                                    <td>0264-5535</td>
                                    <td>United Kingdom</td>
                                    <td>Glasgow</td>
                                    <td>6 Lakeland Center</td>
                                    <td>Dinnie Joyes</td>
                                    <td>Keebler Group</td>
                                    <td>6/5/2016</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>32</td>
                                    <td>15370-110</td>
                                    <td>China</td>
                                    <td>Caijiang</td>
                                    <td>2 Mariners Cove Way</td>
                                    <td>Kerianne Axelbey</td>
                                    <td>Wolff, Sporer and Bechtelar</td>
                                    <td>2/20/2016</td>
                                    <td>6</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>33</td>
                                    <td>67046-271</td>
                                    <td>China</td>
                                    <td>Sanhe</td>
                                    <td>537 Graceland Park</td>
                                    <td>Kiley MacTerlagh</td>
                                    <td>Hauck Inc</td>
                                    <td>6/9/2017</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>34</td>
                                    <td>49288-0356</td>
                                    <td>Indonesia</td>
                                    <td>Rupe</td>
                                    <td>88 Blackbird Alley</td>
                                    <td>Trula Shuttle</td>
                                    <td>Will-Morissette</td>
                                    <td>2/28/2016</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>35</td>
                                    <td>41163-332</td>
                                    <td>Poland</td>
                                    <td>Borowno</td>
                                    <td>72 Iowa Drive</td>
                                    <td>Hollis Brislen</td>
                                    <td>Lowe, Jaskolski and Gulgowski</td>
                                    <td>7/7/2016</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>68428-088</td>
                                    <td>Greece</td>
                                    <td>Néa Péramos</td>
                                    <td>76 Haas Alley</td>
                                    <td>Marsh Battin</td>
                                    <td>Fay LLC</td>
                                    <td>6/3/2017</td>
                                    <td>6</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>37</td>
                                    <td>52686-288</td>
                                    <td>Chile</td>
                                    <td>San Carlos</td>
                                    <td>6915 Mifflin Terrace</td>
                                    <td>Patrizio Pinnion</td>
                                    <td>Haag-Stokes</td>
                                    <td>10/7/2016</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>68084-534</td>
                                    <td>Ukraine</td>
                                    <td>Ukrainka</td>
                                    <td>77 Charing Cross Trail</td>
                                    <td>Ilario Daouse</td>
                                    <td>Nitzsche, Davis and Romaguera</td>
                                    <td>4/10/2016</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>39</td>
                                    <td>60681-2104</td>
                                    <td>China</td>
                                    <td>Shangdu</td>
                                    <td>61653 Welch Trail</td>
                                    <td>Blisse Coleborn</td>
                                    <td>Bailey, Windler and Marquardt</td>
                                    <td>5/15/2017</td>
                                    <td>6</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>63402-193</td>
                                    <td>China</td>
                                    <td>Xibin</td>
                                    <td>9 Duke Point</td>
                                    <td>Augustin Jouannisson</td>
                                    <td>Witting, Reilly and Morar</td>
                                    <td>7/3/2016</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>41</td>
                                    <td>0078-0614</td>
                                    <td>Russia</td>
                                    <td>Skolkovo</td>
                                    <td>5 Bay Center</td>
                                    <td>Kaleena Jennison</td>
                                    <td>Johnston Inc</td>
                                    <td>11/26/2016</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>60660-7787</td>
                                    <td>Dominican Republic</td>
                                    <td>Pimentel</td>
                                    <td>5 Northwestern Drive</td>
                                    <td>Mariel Petronis</td>
                                    <td>Mitchell, Bashirian and Schroeder</td>
                                    <td>1/28/2016</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>51079-345</td>
                                    <td>Malaysia</td>
                                    <td>Kuala Lumpur</td>
                                    <td>11 Melvin Hill</td>
                                    <td>Adamo Scroggie</td>
                                    <td>Cartwright Group</td>
                                    <td>6/9/2016</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>29033-021</td>
                                    <td>Portugal</td>
                                    <td>Serzedelo</td>
                                    <td>380 Wayridge Street</td>
                                    <td>Lewiss Kilmartin</td>
                                    <td>Stroman-Orn</td>
                                    <td>5/9/2017</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>45</td>
                                    <td>12830-816</td>
                                    <td>France</td>
                                    <td>Fos-sur-Mer</td>
                                    <td>9924 Mariners Cove Circle</td>
                                    <td>Claretta Sachno</td>
                                    <td>Zemlak-Cruickshank</td>
                                    <td>9/4/2016</td>
                                    <td>4</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>46</td>
                                    <td>0781-5555</td>
                                    <td>Indonesia</td>
                                    <td>Kotaagung</td>
                                    <td>9 Calypso Road</td>
                                    <td>Bryn Van Castele</td>
                                    <td>Beier-Mante</td>
                                    <td>3/17/2017</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>47</td>
                                    <td>0378-7004</td>
                                    <td>Sweden</td>
                                    <td>Karlstad</td>
                                    <td>12000 Burrows Street</td>
                                    <td>Tades Gatch</td>
                                    <td>Klocko, Koelpin and Nikolaus</td>
                                    <td>7/10/2016</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>48</td>
                                    <td>49483-052</td>
                                    <td>Indonesia</td>
                                    <td>Kebonjaya</td>
                                    <td>2 Oakridge Crossing</td>
                                    <td>Reinold Jolland</td>
                                    <td>Zieme-Funk</td>
                                    <td>5/24/2016</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>49</td>
                                    <td>10812-357</td>
                                    <td>Serbia</td>
                                    <td>Ruma</td>
                                    <td>7 Wayridge Plaza</td>
                                    <td>Ky Brainsby</td>
                                    <td>Towne Inc</td>
                                    <td>11/1/2016</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                                <tr>
                                    <td>50</td>
                                    <td>49349-222</td>
                                    <td>China</td>
                                    <td>Zhulan</td>
                                    <td>55385 Stoughton Trail</td>
                                    <td>Sheryl Giddings</td>
                                    <td>Grimes, Ryan and Larkin</td>
                                    <td>9/15/2017</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end: Datatable-->


                        <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">

                                            <p>{{ $message }}</p>

                                        </div>
                                    @endif


                                    {{-- <table
                                        class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed"
                                        id="kt_datatable" role="grid" aria-describedby="kt_datatable_info"
                                        style="width: 979px;">
                                        <thead>
                                            <tr>

                                                <th>No</th>

                                                <th>First Name</th>

                                                <th>Last Name</th>

                                                <th>Email</th>

                                                <th>Phone</th>

                                                <th>Image</th>

                                                <th>Type</th>

                                                <th>Gender</th>

                                                <th>Roles</th>

                                                <th width="280px">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $key => $user)
                                                <tr>

                                                    <td>{{ ++$i }}</td>

                                                    <td>{{ $user->fname }}</td>

                                                    <td>{{ $user->lname }}</td>

                                                    <td>{{ $user->email }}</td>

                                                    <td>{{ $user->phone }}</td>

                                                    <td><img src="{{ asset('storage/' . $user->image) }}" width="50px"
                                                            height="50px" alt="" srcset=""></td>

                                                    <td>{{ $user->type }}</td>

                                                    <td>{{ $user->gender }}</td>

                                                    <td>

                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                                <label
                                                                    class="badge badge-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif

                                                    </td>

                                                    <td>

                                                        <a class="btn btn-info"
                                                            href="{{ route('Users.show', $user->id) }}">Show</a>

                                                        {{-- @can('user-edit') --}}
                                                        {{-- <a class="btn btn-primary"
                                                            href="{{ route('Users.edit', $user->id) }}">Edit</a>

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['Users.destroy', $user->id], 'style' => 'display:inline']) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                        {!! Form::close() !!} --}}

                                                    {{-- </td>

                                                </tr>
                                            @endforeach --}}

                                        {{-- </tbody>
                                    </table>  --}}

                                    {{-- {!! $data->render() !!} --}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection



@section('scripts')

    <script>
        $(document).ready(function(e) {


        });
    </script>
@endsection
