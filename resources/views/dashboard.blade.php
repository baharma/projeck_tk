<x-main-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <h4 class="fw-bold py-3 mb-4">
    Dashboard
  </h4>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="row">
        <div class="col-lg-6 mb-3 mb-lg-0">
          <div class="card mb-3">
            <div class="card-body ">
              <div class="card-title">
                Grafik Siswa Tahunan
              </div>
              <div id="chartSiswa"></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body ">
              <div class="card-title">
                Data Usia Orang Tua
              </div>
              <div class="row">
                <div class="col-4">
                  <h4 class="mb-0">{{ !is_null($parent['min_age_parent']) ? $parent['min_age_parent'] : '0' }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Paling Muda</span></small>
                </div>
                <div class="col-4">
                  <h4 class="mb-0">{{ !is_null($parent['max_age_parent']) ? $parent['max_age_parent'] : '0' }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Paling Tua</span></small>
                </div>
                <div class="col-4">
                  <h4 class="mb-0">{{ !is_null($parent['avg_age_parent']) ? $parent['avg_age_parent'] : '0' }} <small><span style="font-size: 12px;"> tahun</span></small></h4>
                  <small><span>Rata - Rata</span></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row mb-3 ">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 px-lg-1">
              <div class="card">
                <div class="card-body ">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-info flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bx-group text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Mendaftar</small></span>
                  <h4 class="card-title mb-1">{{$allSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>

            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0  px-lg-1">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-warning flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bxs-user-rectangle text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Pending</small></span>
                  <h4 class="card-title mb-1">{{$pendingSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0  px-lg-1">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="bg-success flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background-color: red; border-radius: 100px">
                      <i class='bx bxs-user-check text-white' style="font-size: 36px;"></i>
                    </div>
                  </div>
                  <span class="d-block mb-3"><small>Total Siswa Diterima</small></span>
                  <h4 class="card-title mb-1">{{$validSiswa}}</h4>
                  <!-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  Data Pendidikan Orang Tua
                </div>

                <ul class="p-0 m-0">
                  @foreach($educationParent as $key => $education)
                  <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                      @if($key + 1 == 1)
                      <span class="avatar-initial rounded bg-label-warning">
                        {{ $key + 1 }}
                      </span>
                      @else
                      <span class="avatar-initial rounded bg-label-primary">
                        {{ $key + 1 }}
                      </span>
                      @endif
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <h6 class="mb-1 fw-normal">{{ $education->name }}</h6>
                      </div>
                      <div class="user-progress">
                        <h6 class="mb-0">{{ $education->jumlah }}</h6>
                      </div>
                    </div>
                  </li>
                  @endforeach

                  @if($educationParent->count() == 0)
                    <li class="text-center mb-4 pb-1">
                      <div class="mb-5">
                        <svg style="width: 150px; height: auto" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 550.71039 567.98584" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M711.24677,733.99292H560.52137a6.616,6.616,0,0,1-6.60858-6.60839V622.00475a6.616,6.616,0,0,1,6.60858-6.60858h150.7254a6.616,6.616,0,0,1,6.60839,6.60858V727.38453A6.6161,6.6161,0,0,1,711.24677,733.99292Z" transform="translate(-324.64481 -166.00708)" fill="#f2f2f2"/><path d="M464.93162,459.293a11.22645,11.22645,0,0,0-3.595-16.83486l-.94985-100.813-18.84219,8.64691,4.1444,97.50067A11.2873,11.2873,0,0,0,464.93162,459.293Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M464.42409,316.12137s-18.32929-8.89112-20.86418,7.88369-12.96145,60.43336-12.96145,60.43336l31.63926-2.23768Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M464.93162,459.293a11.22645,11.22645,0,0,0-3.595-16.83486l-.94985-100.813-18.84219,8.64691,4.1444,97.50067A11.2873,11.2873,0,0,0,464.93162,459.293Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M464.42409,316.12137s-18.32929-8.89112-20.86418,7.88369-12.96145,60.43336-12.96145,60.43336l31.63926-2.23768Z" transform="translate(-324.64481 -166.00708)" fill="#696cff"/><path d="M411.35263,704.46626a3.61323,3.61323,0,0,1-2.61865-6.26262c.09111-.36213.15647-.62217.24758-.9843q-.0489-.11821-.09837-.23628a9.70311,9.70311,0,0,0-17.89849.06652c-2.92739,7.05051-6.65447,14.11307-7.57216,21.5678a28.7054,28.7054,0,0,0,.5039,9.87234,115.08614,115.08614,0,0,1-10.46893-47.79893,111.07991,111.07991,0,0,1,.689-12.392q.5708-5.05966,1.58377-10.0473a116.4192,116.4192,0,0,1,23.087-49.34152,30.9826,30.9826,0,0,0,12.88556-13.36893,23.6336,23.6336,0,0,0,2.14933-6.45821c-.62729.08228-1.26489.13369-1.89217.17479-.19543.01023-.40108.02055-.59651.03087l-.07369.0033a3.57989,3.57989,0,0,1-2.9401-5.83225q.40627-.5.81305-.99948c.4114-.51423.833-1.01814,1.24434-1.53228a1.7836,1.7836,0,0,0,.13369-.15432c.47313-.58619.94609-1.16206,1.41922-1.74825a10.35176,10.35176,0,0,0-3.39367-3.28044c-4.74083-2.77661-11.28133-.85358-14.70586,3.43476-3.43476,4.28826-4.0826,10.30438-2.88976,15.66218a41.48513,41.48513,0,0,0,5.73842,12.793c-.25715.32912-.52454.64792-.78161.977a117.17121,117.17121,0,0,0-12.22973,19.37481,48.70929,48.70929,0,0,0-2.908-22.62447c-2.78346-6.71479-8.00064-12.37-12.595-18.17495-5.51857-6.97261-16.83488-3.9296-17.80713,4.90927q-.01412.12837-.02757.25665,1.02363.57749,2.004,1.22586a4.9011,4.9011,0,0,1-1.976,8.91908l-.09994.01543a48.7668,48.7668,0,0,0,1.28544,7.29124A50.20988,50.20988,0,0,0,376.56347,641.273c.40108.20565.79193.41131,1.193.60673a119.598,119.598,0,0,0-6.43767,30.296,113.43525,113.43525,0,0,0,.08228,18.31542l-.03086-.216a29.97408,29.97408,0,0,0-10.23241-17.3076c-7.87438-6.46853-18.9994-8.8505-27.49446-14.04994a5.62528,5.62528,0,0,0-8.61571,5.47252q.01709.11352.03474.227a32.92633,32.92633,0,0,1,3.69184,1.779q1.02362.57761,2.004,1.22585a4.90116,4.90116,0,0,1-1.976,8.91917l-.1.01535c-.072.01031-.13369.02063-.20557.03094a48.80758,48.80758,0,0,0,8.97767,14.05786A50.25446,50.25446,0,0,0,373.9,706.63672h.01032a119.56344,119.56344,0,0,0,8.03167,23.447h28.69167c.10291-.3188.19542-.64792.288-.96672a32.59925,32.59925,0,0,1-7.93916-.473c2.12878-2.61214,4.25747-5.24483,6.38625-7.85688a1.78139,1.78139,0,0,0,.1337-.15424c1.07978-1.33685,2.16987-2.66347,3.24965-4.00032l.00058-.00165a47.75027,47.75027,0,0,0-1.39916-12.16412Z" transform="translate(-324.64481 -166.00708)" fill="#f2f2f2"/><path d="M834.35263,704.46626a3.61323,3.61323,0,0,1-2.61865-6.26262c.09111-.36213.15647-.62217.24758-.9843q-.0489-.11821-.09837-.23628a9.70311,9.70311,0,0,0-17.89849.06652c-2.92739,7.05051-6.65447,14.11307-7.57216,21.5678a28.7054,28.7054,0,0,0,.5039,9.87234,115.08614,115.08614,0,0,1-10.46893-47.79893,111.07991,111.07991,0,0,1,.689-12.392q.5708-5.05966,1.58377-10.0473a116.4192,116.4192,0,0,1,23.087-49.34152,30.9826,30.9826,0,0,0,12.88556-13.36893,23.6336,23.6336,0,0,0,2.14933-6.45821c-.62729.08228-1.26489.13369-1.89217.17479-.19543.01023-.40108.02055-.59651.03087l-.07369.0033a3.57989,3.57989,0,0,1-2.9401-5.83225q.40627-.5.813-.99948c.4114-.51423.833-1.01814,1.24434-1.53228a1.7836,1.7836,0,0,0,.13369-.15432c.47313-.58619.94609-1.16206,1.41922-1.74825a10.35176,10.35176,0,0,0-3.39367-3.28044c-4.74083-2.77661-11.28133-.85358-14.70586,3.43476-3.43476,4.28826-4.0826,10.30438-2.88976,15.66218a41.48513,41.48513,0,0,0,5.73842,12.793c-.25715.32912-.52454.64792-.78161.977a117.17121,117.17121,0,0,0-12.22973,19.37481,48.70929,48.70929,0,0,0-2.908-22.62447c-2.78346-6.71479-8.00064-12.37-12.595-18.17495-5.51857-6.97261-16.83488-3.9296-17.80713,4.90927q-.01412.12837-.02757.25665,1.02363.57749,2.004,1.22586a4.9011,4.9011,0,0,1-1.976,8.91908l-.09994.01543a48.7668,48.7668,0,0,0,1.28544,7.29124A50.20988,50.20988,0,0,0,799.56347,641.273c.40108.20565.79193.41131,1.193.60673a119.598,119.598,0,0,0-6.43767,30.296,113.43525,113.43525,0,0,0,.08228,18.31542l-.03086-.216a29.97408,29.97408,0,0,0-10.23241-17.3076c-7.87438-6.46853-18.9994-8.8505-27.49446-14.04994a5.62528,5.62528,0,0,0-8.61571,5.47252q.01708.11352.03474.227a32.92633,32.92633,0,0,1,3.69184,1.779q1.02362.57761,2.004,1.22585a4.90116,4.90116,0,0,1-1.976,8.91917l-.1.01535c-.072.01031-.13369.02063-.20557.03094a48.80758,48.80758,0,0,0,8.97767,14.05786A50.25446,50.25446,0,0,0,796.9,706.63672h.01032a119.56344,119.56344,0,0,0,8.03167,23.447h28.69167c.10291-.3188.19542-.64792.288-.96672a32.59925,32.59925,0,0,1-7.93916-.473c2.12878-2.61214,4.25747-5.24483,6.38625-7.85688a1.78139,1.78139,0,0,0,.1337-.15424c1.07978-1.33685,2.16987-2.66347,3.24965-4.00032l.00058-.00165a47.75027,47.75027,0,0,0-1.39916-12.16412Z" transform="translate(-324.64481 -166.00708)" fill="#f2f2f2"/><path d="M723.86447,729.89617c-.08252,0-.165-.00195-.24756-.0039a8.169,8.169,0,0,1-7.70215-8.25488c0-12.79493-9.13965-20.25879-18.19726-21.9795-9.05762-1.71972-20.29785,1.8711-24.98926,13.77637l-4.26514,10.707a19.67152,19.67152,0,0,1-27.78662,0l-.25244-.252.15674-.32129,75.334-154.13379v-3.77734a19.488,19.488,0,0,1,.002-3.5l-.002-388.20313a7.94627,7.94627,0,0,1,8.19043-7.94287,8.16941,8.16941,0,0,1,7.70264,8.25488v387.936a19.489,19.489,0,0,1-.00195,3.5l.00195,3.73144,75.49072,154.45606-.25244.252a19.67152,19.67152,0,0,1-27.78662,0l-.11182-.16992-4.15332-10.53711c-4.6914-11.9043-15.93017-15.49316-24.98926-13.77637-9.05761,1.72071-18.19726,9.18457-18.19726,21.9795v.3125a7.94652,7.94652,0,0,1-7.94336,7.94628Z" transform="translate(-324.64481 -166.00708)" fill="#e6e6e6"/><path d="M861.76287,446.99292H585.95965A12.10626,12.10626,0,0,1,573.867,434.90063v-192.828A12.10611,12.10611,0,0,1,585.95965,229.98H861.76287a12.10626,12.10626,0,0,1,12.09229,12.09264v192.828A12.10641,12.10641,0,0,1,861.76287,446.99292Z" transform="translate(-324.64481 -166.00708)" fill="#fff"/><path d="M861.76291,448.49285H585.95968a13.60791,13.60791,0,0,1-13.59277-13.59179V242.07244a13.608,13.608,0,0,1,13.59277-13.59228H861.76291a13.60791,13.60791,0,0,1,13.59228,13.59228V434.90106A13.6078,13.6078,0,0,1,861.76291,448.49285ZM585.95968,231.48016a10.60442,10.60442,0,0,0-10.59277,10.59228V434.90106a10.60463,10.60463,0,0,0,10.59277,10.59179H861.76291a10.60421,10.60421,0,0,0,10.59228-10.59179V242.07244a10.604,10.604,0,0,0-10.59228-10.59228Z" transform="translate(-324.64481 -166.00708)" fill="#f2f2f2"/><path d="M764.63979,242.0363H683.08263a19.52487,19.52487,0,0,1-19.5028-19.5028v-.35459H784.14258v.35459A19.52486,19.52486,0,0,1,764.63979,242.0363Z" transform="translate(-324.64481 -166.00708)" fill="#e6e6e6"/><path d="M764.99438,459.04925H683.43723a19.52509,19.52509,0,0,1-19.5028-19.5028v-.35459H784.49718v.35459A19.52509,19.52509,0,0,1,764.99438,459.04925Z" transform="translate(-324.64481 -166.00708)" fill="#e6e6e6"/><path d="M874.31485,730.88939a1.18647,1.18647,0,0,1-1.19006,1.19h-547.29a1.19,1.19,0,0,1,0-2.38h547.29A1.18651,1.18651,0,0,1,874.31485,730.88939Z" transform="translate(-324.64481 -166.00708)" fill="#ccc"/><polygon points="184.306 537.181 198.722 537.181 205.58 481.575 184.303 481.576 184.306 537.181" fill="#9e616a"/><path d="M504.06863,696.07669l22.78907-1.3602v9.76383l21.6662,14.96345a6.09886,6.09886,0,0,1-3.46558,11.11765H517.92709l-4.67648-9.65792-1.82593,9.65792H501.19512Z" transform="translate(-324.64481 -166.00708)" fill="#2f2e41"/><polygon points="135.277 227.892 133.865 234.622 132.664 259.447 180.908 252.915 184.613 224.169 179.492 215.755 135.277 227.892" fill="#9e616a"/><polygon points="111.347 537.181 125.763 537.181 132.621 481.575 111.344 481.576 111.347 537.181" fill="#9e616a"/><path d="M428.1707,604.94848l-.00054-.14891,5.39635-25.192,3.32751-12.54128-9.24939-73.42936c-2.17782-53.34848,28.7723-78.9931,29.01588-79.24519l.67116-.69775,49.63579-1.2147c26.70628,16.00123,23.683,103.51941,28.57341,163.039.34872,4.24414,4.73124,10.50859,3.654,14.54583-8.54582,32.02677-6.04255,66.6612-12.553,67.685l-19.96125-.27744-10.30939-46.78874,9.51636-35.68634c-4.22057-.77752-7.13727-21.41179-7.13727-21.41179-1.83905-2.18368-8.1881-20.75593-8.1881-20.75593l-8.46552-51.40977-13.601,88.42417,3.27551,20.74438-2.71071,7.13285-11.60823,58.88563-.12339.94878L435.44348,655.37Z" transform="translate(-324.64481 -166.00708)" fill="#2f2e41"/><path d="M431.10991,696.07669l22.78906-1.3602v9.76383l21.6662,14.96345a6.09886,6.09886,0,0,1-3.46557,11.11765H444.96836l-4.67648-9.65792-1.82593,9.65792H428.23639Z" transform="translate(-324.64481 -166.00708)" fill="#2f2e41"/><path d="M499.72323,296.81336l12.16793,13.51992,14.61521,27.54745-7.17925,33.96819,3.13895,15.93971,4.635,17.52209c-17.8595,9.87926-39.074-3.76443-58.5635-9.82419l-19.176,8.4722,1.014-23.32186.52-58.76042a16.46939,16.46939,0,0,1,17.73187-16.27514h0l12.84392-9.464Z" transform="translate(-324.64481 -166.00708)" fill="#696cff"/><circle cx="171.67023" cy="98.07194" r="25.65727" fill="#9e616a"/><path d="M526.50637,254.81959c-.452,2.51394-11.2531,3.72725-10.928-.74545-2.10149,4.211-5.24175,10.322-1.24175,17.322a10.98281,10.98281,0,0,0-1.48157,12.81309,33.15262,33.15262,0,0,1,2.847,5.84463,8.87535,8.87535,0,0,1,.32512,1.51466,2.89763,2.89763,0,0,1-4.12372,2.97386c-10.88039-5.32913-29.85434-4.42589-41.75772-1.17444q.119-3.47344-.09516-6.93107a17.13363,17.13363,0,0,1-3.37832,7.91442c-2.03809.60271-4.03649,1.22919-5.97148,1.84777a1.71539,1.71539,0,0,1-2.18084-2.09361,9.64658,9.64658,0,0,0,.2062-4.203c-.49172-2.90252-1.95087-5.52745-2.9818-8.27924s-1.61781-5.916-.35687-8.57264c1.95876-4.12377,7.47826-5.38471,9.91287-9.24676,2.736-4.33784.61065-9.99215,1.03886-15.1072.60271-7.23243,6.52662-13.10875,13.204-15.94781,11.56233-4.9168,26.02719-.935,34.695,8.15314a7.93768,7.93768,0,0,1,8.303-.35687c2.56152,1.37192,4.4013,2.08567,5.5512,4.75817C529.09959,247.65062,526.96634,252.29776,526.50637,254.81959Z" transform="translate(-324.64481 -166.00708)" fill="#2f2e41"/><path d="M515.48591,556.53986l-60.36453-60.36452a3.7472,3.7472,0,0,1-.00008-5.29331l42.20391-42.20391a3.74715,3.74715,0,0,1,5.29338,0l60.36453,60.36453a3.7472,3.7472,0,0,1-.00008,5.29331l-42.2039,42.2039A3.74724,3.74724,0,0,1,515.48591,556.53986Z" transform="translate(-324.64481 -166.00708)" fill="#fff"/><path d="M518.13254,558.63348a4.71009,4.71009,0,0,1-3.35352-1.38672L454.41427,496.8825a4.74593,4.74593,0,0,1,0-6.707l42.20411-42.2041a4.74649,4.74649,0,0,1,6.70752,0l60.36425,60.36426a4.7459,4.7459,0,0,1,0,6.707l-42.2041,42.2041A4.71009,4.71009,0,0,1,518.13254,558.63348ZM499.97189,448.58367a2.71951,2.71951,0,0,0-1.939.80176l-42.20459,42.2041a2.74665,2.74665,0,0,0,0,3.87891l60.36474,60.36426a2.81453,2.81453,0,0,0,3.87891,0l42.2041-42.2041a2.74665,2.74665,0,0,0,0-3.87891l-60.36475-60.36426A2.72144,2.72144,0,0,0,499.97189,448.58367Z" transform="translate(-324.64481 -166.00708)" fill="#e6e6e6"/><path d="M492.74166,454.293a11.22642,11.22642,0,0,1,3.595-16.83486l.94985-100.813,18.84219,8.64691-4.1444,97.50067A11.2873,11.2873,0,0,1,492.74166,454.293Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M493.24918,311.12137s18.3293-8.89112,20.86419,7.88369,12.96145,60.43336,12.96145,60.43336l-31.63926-2.23768Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M492.74166,454.293a11.22642,11.22642,0,0,1,3.595-16.83486l.94985-100.813,18.84219,8.64691-4.1444,97.50067A11.2873,11.2873,0,0,1,492.74166,454.293Z" transform="translate(-324.64481 -166.00708)" fill="#9e616a"/><path d="M493.24918,311.12137s18.3293-8.89112,20.86419,7.88369,12.96145,60.43336,12.96145,60.43336l-31.63926-2.23768Z" transform="translate(-324.64481 -166.00708)" fill="#696cff"/></svg>
                      </div>
                      <h3 class="text-center">Tidak ada data</h3>
                      <p class="text-center">Pastikan data orang tua wali telah disimpan</p>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('script')
  <script>
    let dataSiswa = JSON.parse('{!! $dataSiswaTahunan !!}');

    let datasets = [];
    let datayear = [];
    let currentYear = (new Date()).getFullYear();

    for (let index = currentYear - 5; index <= currentYear; index++) {
      datayear.push(index);
      let item = dataSiswa.find((item) => item.tahun == index);
      if (item) {
        datasets.push(item.jumlah);
      } else {
        datasets.push(0);
      }

    }

    const chartSiswaEl = document.querySelector('#chartSiswa');
    const chartSiswaConfig = {
      series: [{
        data: datasets
      }],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [{
          fillColor: config.colors.white,
          seriesIndex: 0,
          dataPointIndex: 7,
          strokeColor: config.colors.primary,
          strokeWidth: 2,
          size: 6,
          radius: 8
        }],
        hover: {
          size: 7
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          // shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: config.colors.borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: -10,
          right: 8
        }
      },
      xaxis: {
        categories: datayear,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: config.colors.axisColor
          }
        }
      },
      yaxis: {
        labels: {
          show: true
        },
        // min: 10,
        // max: 50,
        tickAmount: 4
      }
    };

    if (typeof chartSiswaEl !== undefined && chartSiswaEl !== null) {
      const chartSiswa = new ApexCharts(chartSiswaEl, chartSiswaConfig);
      chartSiswa.render();
    }
  </script>
  @endpush
</x-main-layout>