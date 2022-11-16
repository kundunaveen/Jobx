<?php

namespace App\Http\Controllers;

use App\Models\CompanyRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    public function companyRatingStoreUpdate(Request $request)
    {

        $data = [
            'status' => false,
            'message' => '',
        ];
        try {
            if ($request->has(['rating_value', 'user_id', 'company_id'])) {

                $rating_value = $request->rating_value;
                $user_id = $request->user_id;
                $company_id = $request->company_id;

                CompanyRating::updateOrCreate(
                    ['employee_id' => $user_id, 'company_id' => $company_id],
                    ['rating' => $rating_value]
                );

                $data['status'] = true;
                $data['message'] = 'Data successfully added';
            } else {
                $data['status'] = false;
                $data['message'] = 'Values are missing';
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
        }
        return Response::json($data);
    }
}
