from flask import Flask, jsonify, request
import mysql.connector
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from pprint import pprint
app = Flask(__name__)

#ketnoicsdl
try:
    mydb = mysql.connector.connect(
        host="127.0.0.1",
        user="root",
        password="",
        database="book_store_nlcs"
    )

    query = '''
    SELECT Sach.*, danhmucsanpham.DM_Ten,TacGia.TG_Ten
    FROM Sach
    JOIN danhmucsanpham ON Sach.DM_Ma = danhmucsanpham.DM_Ma
    JOIN TacGia ON Sach.TG_Ma = TacGia.TG_Ma
    '''
    df_sanpham = pd.read_sql(query, mydb)
    pprint(df_sanpham.head())

except mysql.connector.Error as e:
    print(f'Error : {e}')

finally:
    if mydb:
        mydb.close()

# Gom đặc trưng
def combineFeatures(row):
    return str(row['DM_Ten']) + " " + str(row['TG_Ten'])

df_sanpham['combineFeatures'] = df_sanpham.apply(combineFeatures, axis=1)
pprint(df_sanpham['combineFeatures'].head())

# tính toán tương đồng
tf = TfidfVectorizer()
tfMatrix = tf.fit_transform(df_sanpham['combineFeatures'])
similar = cosine_similarity(tfMatrix)

number = 5

@app.route('/api', methods=['GET'])
def get_data():
    ket_qua = []
    # print(ket_qua)
    productid = request.args.get('id')
    productid = int(productid)

    if productid not in df_sanpham['S_Ma'].values:
        return jsonify({'Loi': 'Id khong hop le'})
  
    indexproduct = df_sanpham[df_sanpham['S_Ma'] == productid].index[0]
    similarProduct = list(enumerate(similar[indexproduct]))
    rounded_similarProduct = [(index, round(value, 5)) for index, value in similarProduct]
    pprint(rounded_similarProduct)
    # pprint(similarProduct)


    sortedSimilarProduct = sorted(similarProduct, key=lambda x:x[1], reverse=True)
    
    # def lay_ten(index):
    #     return df_sanpham[df_sanpham.index == index]['S_Ten'].values[0]
    # # def lay_gia(index):
    # #     return df_sanpham[df_sanpham.index == index]['S_GiaBan'].values[0]
    # for i in range(1, number + 1):
    #     print(lay_ten(sortedSimilarProduct[i][0]))
    #     ket_qua.append(lay_ten(sortedSimilarProduct[i][0]))
    #     # ket_qua.append(lay_gia(sortedSimilarProduct[i][0]))

    # data = {'san pham goi y': ket_qua}
    # return jsonify(data)
    for i in range(1, number + 1):
        product_info = df_sanpham.iloc[sortedSimilarProduct[i][0]]
        product_data = {
            'S_Ma' : int(product_info['S_Ma']),
            'S_Ten': product_info['S_Ten'],
            'S_GiaBan': product_info['S_GiaBan'],
            'S_HinhAnh' : product_info['S_HinhAnh']
        }
        pprint(product_data)
        ket_qua.append(product_data)

    data = {'san pham goi y': ket_qua}
    return jsonify(data)

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5555)