
# simple name to original name
commodity_map = {
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


def getAllCommodity():
    return list(commodity_map.keys())


def toCommodityName(simple_name):
    return commodity_map[simple_name]
