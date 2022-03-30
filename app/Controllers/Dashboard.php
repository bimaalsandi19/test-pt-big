<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SubmenuModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\RESTful\ResourceController;

class Dashboard extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        $session = session();
        $menumodel = new MenuModel();
        $submenumodel = new SubmenuModel();
        $data = [
            'menu' => $menumodel->findAll(),
            'submenu' => $submenumodel->findAll()
        ];
        return view('/admin/dashboard_view', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function menu()
    {
        return view('admin/menu_add_view');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function add_menu()
    {
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu')
        ];
        $menumodel = new MenuModel();
        $menumodel->save($data);
        return redirect()->to('/dashboard');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function submenu()
    {
        $submenumodel = new SubmenuModel();
        $menumodel = new MenuModel();
        $data['menu'] = $menumodel->findAll();
        return view('admin/sub_menu_add_view', $data);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function add_submenu()
    {
        $submenumodel = new SubmenuModel();
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'nama_submenu' => $this->request->getVar('nama_submenu'),
        ];
        $submenumodel->save($data);
        return redirect()->to('/dashboard');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
