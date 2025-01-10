<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class SupervisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'v_a_e_d_p_d_t' => fake()->word(),
            'a_p_i' => fake()->word(),
            'a_p_m' => fake()->word(),
            'a_d_q_d_i' => fake()->word(),
            'd_d_i_p'=> fake()->word(),
            'p_d_a_s_a' => fake()->word(),
            'l_d_r_p_d' => fake()->word(),
            'l_d_p_m_p' => fake()->word(),
            'l_d_p_p_l' => fake()->word(),
            'l_d_p_c_r' => fake()->word(),
            'r_n_p_ats_1' => fake()->word(),
            'r_n_p_ats_2' => fake()->word(),
            'r_n_p_ats_3' => fake()->word(),
            'i_e_s_r_1' => fake()->word(),
            'i_e_s_r_2' => fake()->word(),
            'i_e_s_r_3' => fake()->word(),
            'a_d_a_d_t_1' => fake()->word(),
            'a_d_a_d_t_2' => fake()->word(),
            'a_d_a_d_t_3' => fake()->word(),
            'r_d_t_p_s_1' => fake()->word(),
            'r_d_t_p_s_2' => fake()->word(),
            'r_d_t_p_s_3' => fake()->word(),
            't_d_s_d_t_1' => fake()->word(),
            't_d_s_d_t_2' => fake()->word(),
            't_d_s_d_t_3' => fake()->word(),
            'c_d_c_d_c_1' => fake()->word(),
            'c_d_c_d_c_2' => fake()->word(),
            'c_d_c_d_c_3' => fake()->word(),
            'p_c_c_r_1' => fake()->word(),
            'p_c_c_r_3' => fake()->word(),
            'p_c_c_r_4' => fake()->word(),
            'c_d_c_d_c_4' => fake()->word(),
            'c_d_c_d_c_5' => fake()->word(),
            'c_d_c_d_c_6' => fake()->word(),
            't_d_p_r_n_1' => fake()->word(),
            't_d_p_r_n_2' => fake()->word(),
            't_d_p_r_n_3' => fake()->word(),
            'r_d_t_d_r_1' => fake()->word(),
            'r_d_t_d_r_2' => fake()->word(),
            'r_d_t_d_r_3' => fake()->word(),
            'r_d_g_e_t_1' => fake()->word(),
            'r_d_g_e_t_2' => fake()->word(),
            'r_d_g_e_t_3' => fake()->word(),
            'r_d_e_d_p_1' => fake()->word(),
            'r_d_e_d_p_2' => fake()->word(),
            'r_d_e_d_p_3' => fake()->word(),
            'd_c_d_d_e_1' => fake()->word(),
            'd_c_d_d_e_2' => fake()->word(),
            'd_c_d_d_e_3' => fake()->word(),
            'r_c_d_n_d_1' => fake()->word(),
            'r_c_d_n_d_2' => fake()->word(),
            'r_c_d_n_d_3' => fake()->word(),
            'p_n_ds_n_f_1' => fake()->word(),
            'p_n_ds_n_f_2' => fake()->word(),
            'p_n_ds_n_f_3' => fake()->word(),
            'p_n_dd_vs_1' => fake()->word(),
            'p_n_dd_vs_2' => fake()->word(),
            'p_n_dd_vs_3' => fake()->word(),
            'p_p_d_d_i' => fake()->word(),
            'p_p_r_h' => fake()->word(),
            'p_p_v_s_o_1' => fake()->word(),
            'p_p_v_s_o_2' => fake()->word(),
            'p_p_v_s_o_3' => fake()->word(),
            'p_p_a_q_d_1' => fake()->word(),
            'p_p_a_q_d_2' => fake()->word(),
            'p_p_a_q_d_3' => fake()->word(),
            'location' => fake()->word(),
            'date' => fake()->word(),
             
        ];
    }
}
