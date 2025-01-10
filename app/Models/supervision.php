<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class supervision extends Model
{

    use HasFactory, Sortable;
    protected $table = 'supervision';

    protected $fillable = [
        'v_a_e_d_p_d_t',
        'a_p_i',
        'a_p_m',
        'a_d_q_d_i',
        'd_d_i_p',
        'p_d_a_s_a',
        'l_d_r_p_d',
        'l_d_p_m_p',
        'l_d_p_p_l',
        'l_d_p_c_r',
        'r_n_p_ats_1',
        'r_n_p_ats_2',
        'r_n_p_ats_3',
        'i_e_s_r_1',
        'i_e_s_r_2',
        'i_e_s_r_3',
        'a_d_a_d_t_1',
        'a_d_a_d_t_2',
        'a_d_a_d_t_3',
        'r_d_t_p_s_1',
        'r_d_t_p_s_2',
        'r_d_t_p_s_3',
        't_d_s_d_t_1',
        't_d_s_d_t_2',
        't_d_s_d_t_3',
        'c_d_c_d_c_1',
        'c_d_c_d_c_2',
        'c_d_c_d_c_3',
        'p_c_c_r_1',
        'p_c_c_r_2',
        'p_c_c_r_3',
        'p_c_c_r_4',
        'c_d_c_d_c_4',
        'c_d_c_d_c_5',
        'c_d_c_d_c_6',
        't_d_p_r_n_1',
        't_d_p_r_n_2',
        't_d_p_r_n_3',
        'r_d_t_d_r_1',
        'r_d_t_d_r_2',
        'r_d_t_d_r_3',
        'r_d_g_e_t_1',
        'r_d_g_e_t_2',
        'r_d_g_e_t_3',
        'r_d_e_d_p_1',
        'r_d_e_d_p_2',
        'r_d_e_d_p_3',
        'd_c_d_d_e_1',
        'd_c_d_d_e_2',
        'd_c_d_d_e_3',
        'r_c_d_n_d_1',
        'r_c_d_n_d_2',
        'r_c_d_n_d_3',
        'p_n_ds_n_f_1',
        'p_n_ds_n_f_2',
        'p_n_ds_n_f_3',
        'p_n_dd_vs_1',
        'p_n_dd_vs_2',
        'p_n_dd_vs_3',
        'p_p_d_d_i',
        'p_p_r_h',
        'p_p_v_s_o_1',
        'p_p_v_s_o_2',
        'p_p_v_s_o_3',
        'p_p_a_q_d_1',
        'p_p_a_q_d_2',
        'p_p_a_q_d_3',
        'location',
        'date',
    ];
    
    public $sortable = [
        'supervision',
        
    ];

    protected $guarded = [
        'id',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('location', 'like', '%' . $search . '%');
        });
    }
}
