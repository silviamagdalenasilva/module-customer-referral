# WolfSellers_CustomerReferral module

<font color='red'>**WolfSellers Referral Management** </font>
# Descripción
El módulo **WolfSellers Referral Management** permite la gestión de referidos dentro de la plataforma Magento. Este módulo permite a los administradores visualizar, filtrar y exportar información sobre los referidos de los clientes.

## Características

- **Visualización de Referidos**: Permite a los administradores acceder a una lista de referidos con información relevante.
- **Filtrado de Datos**: Los administradores pueden filtrar los referidos por email y otros criterios.
- **Exportación a CSV**: Opción para exportar la lista de referidos a un archivo CSV para su análisis o procesamiento externo.
- **Gestión de Accesos**: Solo los usuarios con rol de Administrador pueden acceder a la sección de gestión de referidos.

## Instalación

```
git@github.com:silviamagdalenasilva/module-customer-referral.git
```

```
bin/magento module:enable WolfSellers_ReferralManagement
bin/magento setup:upgrade
bin/magento cache:clean
```


## Vistas Solución aplicada ##

### View frontend ###
#### En My Account -> My Referrals ####

<img src="http://imgfz.com/i/uDExQhK.png" />
<br/><br/>
<img src="http://imgfz.com/i/KiLxkQy.png" />
<br/><br/>
<img src="http://imgfz.com/i/L67UGKc.png" />


### View admin ###
#### En Customer -> Referral Management ####

Por tiempo nose llego a probar completo ver el grid en admin. Pero se dejo la estructura de la idea como levantar la informacion para luego mostrarse en la grilla. Asi como tambien exportar un csv.

<img src="http://imgfz.com/i/sX1Nu3F.png" />
<br/>