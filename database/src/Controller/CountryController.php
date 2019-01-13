<?php

namespace App\Controller;

use App\Model\Database\CountryDb;
use App\Model\Country;
use App\Serves\ConnectDb;

class CountryController extends Controller
{
    /**
     * @var CountryDb
     */
    private $countryDb;

    public function __construct()
    {
        $this->countryDb = new CountryDb(ConnectDb::get());
    }

    public function showAction()
    {
        $countries = $this->countryDb->getAll();

        $this->view(['countries' => $countries], 'countries/show_country');
    }

    public function editAction()
    {
        if (array_key_exists('id', $_GET)) {
            $country = $this->countryDb->getCountry($_GET['id']);
        }

        $validates = [];
        $name = $country->getName();
        $code = $country->getCode();
        $phoneCode = $country->getPhoneCode();
        if (array_key_exists('action', $_POST) && $_POST['action'] === 'add') {

            $name = $_POST['name'];
            $code = $_POST['code'];
            $phoneCode = ($_POST['phone_code']);

            $this->validateName($validates, $name);
            $this->validateCode($validates, $code);
            $this->validatePhoneCode($validates, $phoneCode);

            if (count($validates) === 0) {
                $country->update($name, $phoneCode, $code);

                $this->countryDb->edit($country);

                $this->redirect('/countries/show');
            }
        }


        $this->view([
            'error' => $validates,
            'name' => $name,
            'code' => $code,
            'phone_code' => $phoneCode,
        ],
            'countries/edit_country'
        );
    }

    public function addAction()
    {
        $validates = [];
        $name = '';
        $code = '';
        $phoneCode = '';
        if (array_key_exists('action', $_POST) && $_POST['action'] === 'add') {

            $name = $_POST['name'];
            $code = $_POST['code'];
            $phoneCode = ($_POST['phone_code']);

            $this->validateName($validates, $name);
            $this->validateCode($validates, $code);
            $this->validatePhoneCode($validates, $phoneCode);

            if (count($validates) === 0) {
                $country = new Country();
                $country->update($name, $phoneCode, $code);

                $this->countryDb->create($country);

                $this->redirect('/countries/show');
            }
        }

        return [
            'data' => [
                'error' => $validates,
                'name' => $name,
                'code' => $code,
                'phone_code' => $phoneCode,
            ],
            'view' => 'countries/add_country'
        ];
    }

    public function deleteAction()
    {
        if (array_key_exists('id', $_GET)) {
            $this->countryDb->delete($_GET['id']);
        }

        $this->redirect('/countries/show');
    }

    private function validateName(&$validates, $name)
    {
        if (strlen($name) < 3 || strlen($name) > 50) {
            $validates['name'] = 'Имя страны должно быть больше 3 или меньше 50 символов!';
        }
    }

    private function validateCode(&$validates, $code)
    {
        if (strlen($code) < 1 || strlen($code) > 5) {
            $validates['code'] = 'Символьный код страны должно быть больше 1 или меньше 5 символов!';
        }
    }

    private function validatePhoneCode(&$validates, $phoneCode)
    {
        $phoneCodeInt = preg_replace("/[^0-9]/", '', $phoneCode);

        if (strlen($phoneCodeInt) != strlen($phoneCode) || strlen($phoneCode) > 4 || strlen($phoneCode) < 1) {
            $validates['phone_code'] = 'Телефоный код страны должен сожержать цифры и длину не больше 4!';
        }
    }

    private function redirect($path = '/') {
        header(sprintf('Location: %s', $path));
        exit;
    }
}
