X EDITABLE
---

# App Kernel

    new WH\XEditableBundle\WHXEditableBundle(),

# layout :

    ...

    {{ XeditablGetLib() | raw }}

    </body>

# On a balise :

    <span {{ XEditableEntity({'id' : Entity.id, 'route' : 'route_name', 'field' : 'fieltochange'}) }}>{{ Entity.name }}</span> :


# In controller
    /**
     * @Route("/editfield", name="bk_user_edit_field")
     * @param $id
     * @param $field
     * @param $value
     */
    public function editField(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $personn = $em->getRepository('AppBundle:Personn')->findOneById($request->request->get('pk'));

        switch($request->request->get('name')) {

            case 'firstname' :
                $personn->setFirstName($request->request->get('value'));
                break;

            case 'lastname' :
                $personn->setLastName($request->request->get('value'));
                break;

        }


        $em->persist($personn);

        $em->flush();

        exit('ok');


    }