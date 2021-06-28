<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Http\Services\PdfMakerService;
use Armancodes\DownloadLink\Models\DownloadLink;
use Illuminate\Http\Request;
use App\Http\Controllers\RulesTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;


class PdfMakerController extends ApiController
{
    use RulesTrait;


    public function getPdf(Request $request, $identifier)
    {
        $data = self::checkRules(
            $request->all(),
            __FUNCTION__,
            $identifier,
            1000
        );
        $result = PdfMakerService::getPdf($identifier, $data);
        $link = URL::asset('public/'.$identifier.'.pdf');


        if ($result) return
            $this->respondItemResult($link);

    }

}


