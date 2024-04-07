<section style="background-color: #FFEBF3; padding: 56px 0 56px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-5 mb-lg-auto">
                <div class="mb-3">
                    <img src="{{ asset('assets/images/' . $company->logo) }}" alt="">
                </div>
                <p>
                    {{ $company->address }}
                </p>
                <ul class="d-flex m-0 p-0 gap-2" style="list-style: none;">
                    <li><a href="{{ $social_media->where('slug' , 'facebook')->first()->url }}"><span class="iconify" data-icon="ic:baseline-facebook" style="color: #F94892; font-size: 36px;"></span></a></li>
                    <li><a href="{{ $social_media->where('slug' , 'instagram')->first()->url }}"><span class="iconify" data-icon="ri:instagram-fill" style="color: #F94892; font-size: 36px;"></span></a></li>
                </ul>
            </div>
            <div class="col-lg-7  mb-5 mb-lg-auto">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-auto">
                        <h5 class="poppins-bold uppercase mb-3">lokasi</h5>
                        <iframe class="w-full rounded border border-2 border-black" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.9065785585885!2d115.29103897589576!3d-8.50845148614894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd217afdcb68a33%3A0x7a93e825a5653b8f!2sTk%20Kemala%20Sari!5e0!3m2!1sid!2sid!4v1711816216653!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-auto">
                        <h5 class="poppins-bold uppercase mb-3">Kontak</h5>
                        <ul class="m-0 p-0" style="list-style: none;">
                            <li>
                                <a target="_blank" href="{{ $social_media->where('slug' , 'whatsapp')->first()->url }}" class="text-decoration-none text-dark">
                                    <span class="iconify me-2" data-icon="ri:whatsapp-fill" style="font-size: 24px; color:#F94892"></span>
                                    {{ $social_media->where('slug' , 'whatsapp')->first()->name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer style="background-color: #FFEBF3;" class="py-4 border-top border-1 border-dark">
    <div class="container">
        <p class="text-center m-0">Copyright All right reserved, TK Kemala asri 2024</p>
    </div>
</footer>