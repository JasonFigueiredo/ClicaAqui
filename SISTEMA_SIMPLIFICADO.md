# 🚀 Sistema de Encurtamento de URLs - ClicaAqui

## 📋 Como funciona

Sistema simples e direto de encurtamento de URLs usando hash de 5 caracteres.

---

## 🗄️ Estrutura do Banco de Dados

```sql
CREATE TABLE urls (
  id VARCHAR(50) PRIMARY KEY,    -- Hash único de 5 caracteres
  url TEXT NOT NULL,             -- URL original
  views INT DEFAULT 0            -- Contador de visualizações
);
```

---

## 🔄 Fluxo de Funcionamento

### 1. Criar link encurtado:
```
Usuário insere: https://google.com

Sistema:
├─ Gera hash: aB3xK (5 caracteres aleatórios)
├─ Salva no banco: id=aB3xK, url=https://google.com, views=0
└─ Exibe URL: http://localhost:9090/aB3xK
```

### 2. Acessar link encurtado:
```
Usuário clica: http://localhost:9090/aB3xK

Sistema:
├─ Busca no banco: WHERE id = 'aB3xK'
├─ Encontra URL: https://google.com
├─ Incrementa views: views = views + 1
└─ Redireciona para: https://google.com
```

---

## 🎲 Hash de 5 Caracteres

**Caracteres disponíveis:** `a-z`, `A-Z`, `0-9` = 62 caracteres

**Combinações possíveis:** 62^5 = **916.132.832** (916 milhões!)

**Exemplos de hash gerados:**
- `aB3xK`
- `Xy9m2`
- `K5pLr`
- `mN7Qz`

---

## 📊 Exemplo do Banco de Dados

```
┌──────────┬─────────────────────────┬───────┐
│ id       │ url                     │ views │
├──────────┼─────────────────────────┼───────┤
│ aB3xK    │ https://google.com      │ 125   │
│ Xy9m2    │ https://youtube.com     │ 45    │
│ K5pLr    │ https://github.com      │ 8     │
└──────────┴─────────────────────────┴───────┘
```

---

## 🎯 Características

✅ **URLs curtas:** Apenas 5 caracteres  
✅ **Único:** 916 milhões de combinações possíveis  
✅ **Simples:** Sem campos extras ou complexidade  
✅ **Rápido:** Inserção e busca direta pelo hash  
✅ **Rastreável:** Contador de views automático  

---

## 🌐 URLs Geradas

**Local (desenvolvimento):**
```
http://localhost:9090/aB3xK
http://localhost:9090/Xy9m2
```

**Online (produção):**
```
https://seudominio.com.br/aB3xK
https://seudominio.com.br/Xy9m2
```

---

## ✅ Resumo Técnico

**Entrada:** URL longa  
**Processo:** Gera hash de 5 caracteres  
**Saída:** URL encurtada  
**Busca:** Pelo hash (id)  
**Redirecionamento:** Automático com contador de views

Sistema simples, eficiente e escalável! 🚀
