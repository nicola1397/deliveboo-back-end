# DeliveBoo

tabelle, tipo di dati e relazioni

## Users

| Filed     | type_data    | attributes                      |
| --------- | ------------ | ------------------------------- |
| id        | int          | auto_increment, unique, notnull |
| name      | varchar(100) | notnull                         |
| last_name | varchar(100) | notnull                         |
| email     | varchar(100) | notnull, unique                 |
| password  | varchar(200) | notnull, unique                 |

## Restaurants

| Filed   | type_data    | attributes                      |
| ------- | ------------ | ------------------------------- |
| id      | int          | auto_increment, unique, notnull |
| name    | varchar(200) | notnull                         |
| slug    | varchar(200) | notnull                         |
| p_iva   | char(11)     | notnull, unique                 |
| image   | varchar(250) | null                            |
| address | varchar(150) | notnull                         |
| user_id | int          | notnull                         |

## Types

| Filed | type_data    | attributes                      |
| ----- | ------------ | ------------------------------- |
| id    | int          | auto_increment, unique, notnull |
| label | varchar(200) | notnull                         |
| color | char(7)      | null, default(#FFFFFF)          |
| image | varchar(250) | null                            |

## restaurant_type

| Filed         | type_data | attributes                      |
| ------------- | --------- | ------------------------------- |
| id            | int       | auto_increment, unique, notnull |
| restaurant_id | int       | notnull                         |
| type_id       | int       | notnull                         |

## Orders

| Filed         | type_data     | attributes                      |
| ------------- | ------------- | ------------------------------- |
| id            | int           | auto_increment, unique, notnull |
| costumer_name | varchar(200)  | notnull                         |
| email         | varchar(200)  | notnull                         |
| phone_number  | varchar(15)   | notnull                         |
| address       | varchar(250)  | notnull                         |
| date_time     | datetime      | notnull                         |
| price         | decimal(4, 2) | notnull                         |

## Dishes

| Filed         | type_data     | attributes                      |
| ------------- | ------------- | ------------------------------- |
| id            | int           | auto_increment, unique, notnull |
| name          | varchar(150)  | notnull                         |
| description   | text          | notnull                         |
| price         | decimal(4, 2) | notnull                         |
| availability  | BOOL          | notnull, default(true)          |
| image         | varchar(250)  | null                            |
| slug          | varchar(150)  | notnull                         |
| restaurant_id | int           | notnull                         |

## dish_order

| Filed    | type_data     | attributes                      |
| -------- | ------------- | ------------------------------- |
| id       | int           | auto_increment, unique, notnull |
| dish_id  | int           | notnull                         |
| order_id | int           | notnull                         |
| quantity | int           | notnull, default(1)             |
| price    | decimal(4, 2) | notnull                         |

<hr>

#### relations

-   restaurant -> has many -> types

    -   type -> has many -> restaurants

-   restaurant -> has many -> dishes

    -   dishes -> has a -> restaurant

-   order -> has many -> dishes
    -   dishes -> has many -> orders

<hr>
