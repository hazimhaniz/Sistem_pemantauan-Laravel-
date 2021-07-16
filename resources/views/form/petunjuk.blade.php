<style>
      th {
        color: #000 !important;
        border-top: none;
        border-left: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }

    td {
        color: #000;
        border-top: 1px solid #DDDDDD;
        border-left: 1px solid #DDDDDD;
        border-top: none !important;
        border-left: none !important;
        border-bottom: none !important;
        border-right: none !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;

    }
</style>

<div class="row">
    <div class="col-md-6">
        <button class="btn btn-petunjuk" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">PETUNJUK <i class="fas fa-map-pin text-dark"></i></button>
        <div class="collapse" id="multiCollapseExample2">
           
                <table class="table" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                    <thead>
                        <tr role="row">
                            <th bgcolor="#50b447" class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">STATUS</th>
                            <th bgcolor="#a0dd84" class="align-top text-center" style="width:70%; vertical-align:top; color:#fff">PENERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($legendStatuses)
                        @foreach($legendStatuses as $status)
                        <tr>
                            <td> <span class="label label-lg label-inline ow pull-left {{ $status->badge }}"> {{ $status->name }} </span> </td>
                            <td class="ow pull-left"> {{ $status->desc }} </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>  
                </table>
           
          </div>
      
    </div>
</div>
