<?php

namespace App\Http\Controllers;

use App\Models\CompanyRating;
use App\Models\FavoriteJob;
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

    public function addFavoriteVacancy(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'html' => '',
        ];
        
        try {
            if ($request->has(['user_id', 'vacancy_id'])) {

                $user_id = $request->user_id;
                $vacancy_id = $request->vacancy_id;

                FavoriteJob::create([
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id
                ]);

                $data['status'] = true;
                $data['message'] = 'Added your favorite job';

                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => false,
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id,
                    'route' => route('favorite-vacancy.destroy'),
                ])->render();

            } else {
                
                $data['status'] = false;
                $data['message'] = 'Values are missing';

                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => '',
                    'vacancy_id' => '',
                    'route' => route('favorite-vacancy.add'),
                ])->render();
            }
        } catch (\Exception $e) {

            $data['status'] = false;
            $data['message'] = $e->getMessage();

            $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                'add_favorite_vacancy' => true,
                'user_id' => '',
                'vacancy_id' => '',
                'route' => route('favorite-vacancy.add'),
            ])->render();
        }
        return Response::json($data);
    }

    public function destroyFavoriteVacancy(Request $request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'html' => '',
        ];
        try {
            if ($request->has(['user_id', 'vacancy_id'])) {

                $user_id = $request->user_id;
                $vacancy_id = $request->vacancy_id;

                FavoriteJob::where([
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id
                ])->delete();

                $data['status'] = true;
                $data['message'] = 'Remove your favorite job';
                
                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => $user_id,
                    'vacancy_id' => $vacancy_id,
                    'route' => route('favorite-vacancy.add'),
                ])->render();
            } else {
                $data['status'] = false;
                $data['message'] = 'Values are missing';
                $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                    'add_favorite_vacancy' => true,
                    'user_id' => '',
                    'vacancy_id' => '',
                    'route' => route('favorite-vacancy.destroy'),
                ])->render();
            }
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
            $data['html'] = view('components.favorite.includes.ajax-favorite-vacancy-component', [
                'add_favorite_vacancy' => true,
                'user_id' => '',
                'vacancy_id' => '',
                'route' => route('favorite-vacancy.destroy'),
            ])->render();
        }
        return Response::json($data);
    }
}
