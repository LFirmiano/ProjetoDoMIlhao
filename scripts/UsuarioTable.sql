CREATE TABLE usuarios(
    id_usuario SERIAL PRIMARY KEY,
    usuario VARCHAR,
    senha VARCHAR,
    cpf VARCHAR,
    created TIMESTAMP,
    modified TIMESTAMP
);

CREATE TABLE endereco_usuarios(
    id_enderecousuario SERIAL PRIMARY KEY,
    cep INTEGER,
    logradouro VARCHAR,
    numero INTEGER,
    complemento VARCHAR,
    bairro VARCHAR,
    uf VARCHAR,
    usuario_id INTEGER,
    created TIMESTAMP,
    modified TIMESTAMP
);

ALTER TABLE "endereco_usuarios" ADD FOREIGN KEY ("usuario_id") REFERENCES "usuarios" ("id_usuario");