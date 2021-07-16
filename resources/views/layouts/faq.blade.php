
<?php foreach ($list_faq_type as $key1 => $faqtype): ?>

<p class="bold">{{ $faqtype->name }}</p>
<?php foreach ($faqtype->faq as $key2 => $value): ?>

<div class="row col-lg-12 m-b-0 m-t-0 p-b-0 p-t-0">
    <div class="card card-default" style="cursor:pointer" id="heading{{$key1}}{{$key2}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key1}}{{$key2}}" aria-expanded="false" aria-controls="collapse{{$key1}}{{$key2}}">
        <div class="card-header mr-auto" role="tab">
            <h4 class="card-title">
                <a style="opacity:5;font-weight: bolder;font-size: 12.5px">
                   {{ $value->question }}
                </a>
            </h4>
        </div>
        <div id="collapse{{$key1}}{{$key2}}" class="collapse" aria-labelledby="heading{{$key1}}{{$key2}}">
            <div class="card-body">
                <div class="form-group row">
                    <ul>    
                        <li>{{ $value->answer }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endforeach ?>

<?php endforeach ?>