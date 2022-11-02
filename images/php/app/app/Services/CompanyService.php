<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class CompanyService
{
    public function find($id): Company
    {
        return Company::find($id)->first();
    }

    public function create(User $user, $title, $description, $phone): Company
    {
        return Company::create([
            'user_id' => $user->id,
            'title' => $title,
            'description' => $description,
            'phone' => $phone,
        ]);
    }

    public function findByAttibutes(User $user, $title = null, $phone = null, $description = null)
    {
        /** @var Builder $query */
        $query = Company::where('user_id', '=', $user->id);

        if ($title) {
            $query->where('title', '=', $title);
        }

        if ($phone) {
            $query->where('phone', '=', $phone);
        }

        if ($description) {
            $query->where('description', '=', $description);
        }

        return $query->get();
    }
}
