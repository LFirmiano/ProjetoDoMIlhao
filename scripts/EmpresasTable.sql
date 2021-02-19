CREATE TABLE empresas(
    id_empresa SERIAL PRIMARY KEY,
    email VARCHAR,
    usuario VARCHAR,
    senha VARCHAR,
    razaoSocial VARCHAR,
    cnpj VARCHAR,
    pendente BOOLEAN,
    created TIMESTAMP,
    modified TIMESTAMP
);

CREATE TABLE endereco_empresas(
    id_enderecoempresa SERIAL PRIMARY KEY,
    cep INTEGER,
    logradouro VARCHAR,
    numero INTEGER,
    complemento VARCHAR,
    cidade VARCHAR,
    bairro VARCHAR,
    uf VARCHAR,
    empresa_id INTEGER,
    created TIMESTAMP,
    modified TIMESTAMP
);

ALTER TABLE "endereco_empresas" ADD FOREIGN KEY ("empresa_id") REFERENCES "empresas" ("id_empresa");

CREATE TABLE telefone_empresas(
    id_telefoneempresa SERIAL PRIMARY KEY,
    ddd INTEGER,
    telefone INTEGER,
    empresa_id INTEGER,
    created TIMESTAMP,
    modified TIMESTAMP
);

ALTER TABLE "telefone_empresas" ADD FOREIGN KEY ("empresa_id") REFERENCES "empresas" ("id_empresa");