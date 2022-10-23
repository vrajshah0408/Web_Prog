import hashlib
def computemd5hash(str):
    str=str.encode("utf-8")
    m=hashlib.md5(str)
    return m.hexdigest()  
def pads(n,d):
    pads=0
    if len(n)<d:
        pads=d-len(n)
    return "0"*pads+n   
def md5encryption():
    password=(input("Enter a Password: "))
    salt=(input("Enter a Salt:-"))
    password=pads(password,4)
    salt=pads(salt,3)
    if len(password)==4 and len(salt)==3 and 0<=int(password)<=1000 and 0<=int(salt)<=100:
        print("hasvalue:" , computemd5hash(password+salt))
    else:
        print("You entered worng details try again")
        md5encryption()
def Pass_Salt(Uid,hashVal):
    global salts
    for pwd in range(0,1000):
        for salt in range(0,100):
            if hashvalue==computemd5hash(pads(str(pwd),4)+pads(str(salt),3)):
                salts[Uid]=pads(str(salt),3)
                print(Uid, pads(str(pwd),4),pads(str(salt),3),  hashVal)
def input_data():

    Uids=open("UID.txt","r")
    hashN=open("Hash.txt","r")
    ids=Uids.read().splitlines()
    hashN=hashN.read().splitlines()
    print ("[Uids, Passwords, Salts, Hashvalues]")
    for i in range(len(ids)):
        compute_password_salt(ids[i],hashN[i])

def check_input():
    userID= (input("Username-- "))
    try:
        c=int(userID)
    except:
        print("the input password and salt does not match any value in the database")
        return

    password = (input("Password-- "))
    try:
        c=int(password)
    except:
        print("the input password and salt does not match any value in the database")
        return


    password = pads(password, 4)

    salt = pads(userID, 3)

    hashN = open("Hash.txt", "r")
    uids = open("UID.txt", "r") 
    hashN = hashN.read().splitlines()
    id = uids.read().splitlines()
    

    if len(password)==4 and len(salt)==3 and 0<=int(password)<=1000 and 0<=int(salt)<=100:
        for i in range(len(id)):
            if userID==id[i]:
                break

        salt=salts[userID]
        hashV=computemd5hash(password+salt)
        if hashV==hashN[i]:
            print("the input password and salt matches a hash value in the database")
        else:
            print("the input password and salt does not match any value in the database")
    else:
        print("the input password and salt does not match any value in the database")


salts={}

md5encryption()
input_data()
check_input()