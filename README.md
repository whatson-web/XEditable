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


