<?php

namespace App\Controllers;

class SurveysController extends BaseController
{
    public function __construct() {
        if (!session()->has('profile')) {
            echo "<script>
            alert('Silahkan login terlebih dahulu sebelum mengikuti survei');
            window.location.replace('" . base_url() . "/login');
            </script>";
        } 
    }

    public function index()
    {
        $data['has_filled'] = 0;

        // Cek user telah mengisi
        if (!empty($this->userAnswerModel->getWhere(['user_id' => session()->get('profile')['id']]))) {
            $data['has_filled'] = 1;
        }

        $data['title'] = 'Survei Govinsy';
        $data['page'] = 'Survei'; //Digunakan untuk indikator di Sidebar
        $data['questions'] = $this->questionModel->findAll();
        $data['answers'] = $this->answerModel->findAll();

        //Views
        echo view('surveys/index', $data);
    }

    public function save()
    {
        for ($i=1; $i < count($this->request->getVar()); $i++) { 
            $this->userAnswerModel->save([
                'user_id' => session()->get('profile')['id'],
                'answer_id' => $this->request->getVar()[$i]
            ]);
        }
        return redirect()->to('/survey');
    }
}
