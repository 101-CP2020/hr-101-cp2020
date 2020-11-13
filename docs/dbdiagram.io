//// https://dbdiagram.io

Table tbl_okpdtr {
  okpdtr int [pk]
  title varchar
}

Table tbl_okved {
  okved varchar [pk]
  title varchar
}

Table tbl_vacancies {
  id int [pk, increment]
  created_by int [not null]
  created_at int
  okpdtr int [not null]
  okved varchar [not null]
  kladr bigint [not null]
  number int
  month_year int
}

Ref: tbl_vacancies.okpdtr > tbl_okpdtr.okpdtr
Ref: tbl_vacancies.okved > tbl_okved.okved
Ref: tbl_vacancies.created_by > tbl_hirer.id

Table tbl_predictions {
  id int [pk, increment]
  okpdtr int [not null]
  created_at int
  3_months_value int
  6_months_value int
  12_months_value int
}

Ref: tbl_predictions.okpdtr > tbl_okpdtr.okpdtr

Table tbl_hirer {
  id int [pk, increment]
  title varchar
}
