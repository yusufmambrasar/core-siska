# CORE

Hierarchical model–view–controller (HMVC) is a software architectural pattern, a variation of model–view–controller (MVC) similar to presentation–abstraction–control (PAC), that was published in 2000 in an article in JavaWorld Magazine, the authors apparently unaware of PAC, which was published 13 years earlier.

The controller has some oversight in that it selects first the model and then the view, realizing an approval mechanism by the controller. The model prevents the view from accessing the data source directly.

## INSTALL

```
git clone https://github.com/yusufmambrasar/core.git
```

## SETUP

Change .htaccess.

```
\.htaccess
```

Change App Configs.

```
\App\Configs\App.php
```

Change Database Configs.

```
\App\Configs\Database.php
```

Change Permission to 755 for Cache Directory;

```
\Caches\
```
