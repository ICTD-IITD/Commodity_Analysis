
# simple name to original name
commodity_map_retail = {
    'Atta (Wheat)': 'Atta (Wheat)',
    'Gram Dal': 'Gram Dal',
    'Masoor Dal': 'Masoor Dal',
    'Mustard Oil': 'Must- ard Oil *',
    'Onion': 'Onion',
    'Potato': 'Potato',
    'Rice': 'Rice',
    'Sugar': 'Sugar',
    'Tomato': 'Tomato'
}


# simple name to original name
commodity_map_wholesale = {
    'Atta (Wheat)': 'Wheat Atta',
    'Gram Dal': 'Green Gram Dal (Moong Dal)',
    'Masoor Dal': 'Masur Dal',
    'Mustard Oil': 'Mustard Oil',
    'Onion': 'Onion',
    'Potato': 'Potato',
    'Rice': 'Rice',
    'Sugar': 'Sugar',
    'Tomato': 'Tomato'
}


def getAllCommodity():
    return list(commodity_map_retail.keys())


def toRetailCommodityName(simple_name):
    return commodity_map_retail[simple_name]



def toWholesaleCommodityName(simple_name):
    return commodity_map_wholesale[simple_name]
   

