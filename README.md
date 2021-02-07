# Desenvolvimento de Plugin Wordpress

Parceria CollabPlay & Código Fonte TV (Gabriel Froes e Vanessa)

Link para o curso  
https://app.collabplay.online/users/076644ed-8bcd-48fe-aa3e-27ae31f4eba3/products/8307089b-d453-4e19-b535-feed2f41364a/contents/f2d97d85-47da-49c7-9d4b-35d5a0ef25ac

Repositório do curso  
https://github.com/gabrielfroes/curso-desenvolvimento-plugins-wordpress/blob/master/src/my-youtube-recommendation.php

Repositório dos estudos  
https://github.com/dantovsky/dev-plugin-wordpress

## Como rodar o ambiente de desenvolvimento

A partir da pasta raiz:
```
sudo docker-compose up
```

Aceder o Wordpress no endereço ({ login: dante, pass: dante }):
```
http://localhost:8080/

```

Adiner
```
http://localhost:8888/
```

## Preparar o tema para tradução

Sempre que usamos texto, devemos envolvê-lo com a seguinte estrutura:
```php
__('string', 'base-name')
```

Exemplo de código **não preparado** para tradução

```
public function add_plugin_page () {

    // Creating a new page in admin area (manage_options = Settings menu)
    add_options_page(
        'Settings',
        'My Youtube Recommendation',
        'manage_options',
        $this->plugin_slug,
        array($this, 'create_admin_page')
    );
}
```

Exemplo de código **preparado** para tradução

```
public function add_plugin_page () {

    // Creating a new page in admin area (manage_options = Settings menu)
    add_options_page(
        __('Settings', 'my-youtube-recommendation'),
        __('My Youtube Recommendation', 'my-youtube-recommendation'),
        'manage_options',
        $this->plugin_slug,
        array($this, 'create_admin_page')
    );
}
```

## Endpoints

- https://www.youtube.com/feeds/videos.xml?channel_id=UCFuIUoyHB12qpYa8Jpxoxow
- https://www.youtube.com/channel/UCFuIUoyHB12qpYa8Jpxoxow
- https://www.m.youtube.com/channel/UCFuIUoyHB12qpYa8Jpxoxow

## Problemas

- https://docs.docker.com/engine/install/linux-postinstall/
